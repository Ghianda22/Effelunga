<?php require (__DIR__."/../config.php");
//$nome = $nome_err = $confirm = "";
$tab = 'supermercato';
$key = 'id_supermercato';

require (__DIR__."/controls_forms/col_names.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {
   
    //validazione nome
    $input_nome =  (trim($_POST['nome']));
    if(empty($input_nome)){
        $errors['nome'] = "Inserisci il nome del nuovo Store";
    } elseif(strlen($input_nome) > 50){
        $errors['nome'] = "Il nome inserito è troppo lungo";
    } else {
        $nome = $input_nome;
    }

    //creo le righe, una con il nome della tabella, una con i valori
    $tab_val = "$tab ("; //nome tabella (
    foreach ($col_name as $col) {   //per ogni colonna nella tabella
        if($col === $key) {         // INSERISCO QUESTO IF PER LE TABELLE CON CHIAVE SERIAL
            continue;
        }
        $tab_val.= $col.","; //aggiungo il nome della colonna e la virgola
        $params[] = $$col; //aggiunge la variabile ($) che si chiama con il nome della colonna ($col) ai parametri da inserire
    }
    $tab_val = substr($tab_val, 0, -1).")";

    // Controllo che il nome non sia già stato inserito 
    $sql_check = "SELECT nome FROM supermercato WHERE  nome = '$nome'";
    $result = pg_query($conn, $sql_check);
    $row = pg_fetch_array($result);
    if(!empty($row[0])){
        $errors['nome'] = "Il nome è già presente nel database.";
    }

    //inserimento nel DB
    if(!array_filter($errors)) {
        //aggiunge tanti $ quanti sono i valori da inserire nella query
        $values = "";
        for ($i = 1; $i <= count($params); $i++) {
            if ($i < count($params)) {
                $values .= "$" . $i . ",";
            } else {
                $values .= "$" . $i;
            }
        }

        //se l'url che fa la richiesta contiene nuovoSupermercato -> creare un supermercato -> query insert
        if (strpos($_SERVER['REQUEST_URI'], 'nuovoSupermercato') !== FALSE) {

            $sql = "INSERT INTO $tab_val VALUES ($values)";
            $insert_query = pg_query_params($conn, $sql, $params);

            $header = "../../index.php";

            //se non c'è nuovoSupermercato -> arrivo da modifyPHP
        } elseif ($_POST['submit'] === "Modifica") { //se ho cliccato sul pulsante modifica creo la query
            $id_supermercato = $_SESSION['key_val'];
            $cond = "$key = ${$key}";
            
            array_shift($col_name);

            $coupled_val = ""; //lista di coppie "chiave = valore"
            for ($i = 0; $i < count($params); $i++) { //per ogni valore crea chiave = $1/$2/$3...
                $coupled_val .= "$col_name[$i] = $" . ($i + 1) . ", ";
            }
            $coupled_val = substr($coupled_val, 0, -2);
            //da settare ogni volta
            $sql = "UPDATE $tab SET $coupled_val WHERE id_supermercato = '$id_supermercato';";  // OCCHIO ALLA CONDIZIONE

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
