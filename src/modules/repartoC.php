<?php require (__DIR__."/../config.php");
//$confirm = $id = $id_err = $nome = $nome_err = "";
$tab = 'reparto';
$key1 = 'id_supermercato';
$key2 = 'nome_reparto';

require (__DIR__."/controls_forms/col_names.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // validazione di supermercato
    $input_id_supermercato =  (trim($_POST['id_supermercato']));
    if (empty($input_id_supermercato)) {
        $errors['id_supermercato'] = "Non hai inserito il codice del supermercato";
    } elseif (!is_numeric($input_id_supermercato)) {
        $errors['id_supermercato'] = "Il codice deve essere composto di soli numeri";
    } else {
        $id_supermercato = $input_id_supermercato;
    }
    
    // validazione di reparto
    $input_nome_reparto =  (trim($_POST['nome_reparto']));
    if (empty($input_nome_reparto)) {
        $errors['nome_reparto'] = "Non hai inserito il nome del reparto";
    } elseif (is_numeric($input_nome_reparto)) {
        $errors['nome_reparto'] = "Il codice deve essere composto di sole lettere";
    } else {
        $nome_reparto = $input_nome_reparto;
    }

    //creo le righe, una con il nome della tabella, una con i valori
    $tab_val = "$tab ("; //nome tabella (
    foreach ($col_name as $col) { //per ogni colonna nella tabella
        $tab_val.= $col.","; //aggiungo il nome della colonna e la virgola
        $params[] = $$col; //aggiunge la variabile ($) che si chiama con il nome della colonna ($col) ai parametri da inserire
    }
    $tab_val = substr($tab_val, 0, -1).")";

    // controllo se il codice del supermercato è presente nel database
    $sql_search = "SELECT id_supermercato FROM supermercato WHERE id_supermercato = '$id_supermercato'";
    $result = pg_query($conn, $sql_search);
    $row = pg_fetch_array($result);
    if (empty($row[0])) {
        $errors['id_supermercato'] = "Attenzione: il codice del supermercato inserito non esiste";
    }

    if (strpos($_SERVER['REQUEST_URI'], 'nuovoReparto') !== FALSE) {
        //controllo che la chiave non sia già presente nel DB
        $sql_search = "SELECT id_supermercato FROM reparto WHERE id_supermercato = '$id_supermercato' AND nome_reparto = '$nome_reparto'";
        $result = pg_query($conn, $sql_search);     
        $row = pg_fetch_array($result);     //se la chiave è già presente nel DB la inserisco nella variabile $row
        if (!empty($row[0])) {              //se la variabile non è vuota vuol dire che la chiave è già presente nel db 
            $errors['double'] = "Esiste già un reparto con questo nome in questo supermercato";
        } 
    }
    //inserimento nel db
    if(!array_filter($errors)){

        //aggiunge tanti $ quanti sono i valori da inserire nella query
        $values = "";
        for ($i = 1; $i <= count($params); $i++) {
            if ($i < count($params)) {
                $values .= "$" . $i . ",";
            } else {
                $values .= "$" . $i;
            }
        }

        //se l'url che fa la richiesta contiene nuovoReparto -> creare un Reparto -> query insert
        if (strpos($_SERVER['REQUEST_URI'], 'nuovoReparto') !== FALSE) {

            $sql = "INSERT INTO $tab_val VALUES ($values)";
            $insert_query = pg_query_params($conn, $sql, $params);

            $header = "../../index.php";

            //se non c'è nuovoReparto -> arrivo da modifyPHP
        } elseif ($_POST['submit'] === "Modifica") { //se ho cliccato sul pulsante modifica creo la query

            $coupled_val = ""; //lista di coppie "chiave = valore"
            for ($i = 0; $i < count($params); $i++) { //per ogni valore crea chiave = $1/$2/$3...
                $coupled_val .= "$col_name[$i] = $" . ($i + 1) . ", ";
            }
            $coupled_val = substr($coupled_val, 0, -2);

            //da settare ogni volta
            $cond1 = "$key1 = '${$key1}'";
            $cond2 = "$key2 = '${$key2}'";
            $sql = "UPDATE $tab SET $coupled_val WHERE $cond1 AND $cond2;";

            $insert_query = pg_query_params($conn, $sql, $params);

            $header = "../../../index.php";
        } else { //altrimenti do un valore standard per tornare indietro senza fare nulla
            $insert_query = true;
            $header = "../../../index.php";
        }
        //se la query va a buon fine, o se non faccio nulla, vado alla pagina originaria
        if ($insert_query) {
            header("Location: $header");
            exit();
        } else {
            exit("C'è stato un errore: " . pg_last_error($conn));
        }
    }
}
?>