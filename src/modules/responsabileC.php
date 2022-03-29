<?php
require (__DIR__."/../config.php");

$tab = 'responsabile';
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

    // validazione cf
    $input_cf =  (trim($_POST["cf"]));
    if(empty($input_cf)) {
        $errors['cf']= "Inserisci il Codice Fiscale";
    } elseif (strlen($input_cf) > 16) {
        $errors['cf']= "Cofice Fiscale non è della lughezza giusta";
    } else {
        $cf = $input_cf;
    }

    //validazione email
    $input_email_aziendale =  (trim($_POST["email_aziendale"]));
    if(empty($input_email_aziendale)){
        $errors['email_aziendale'] =  "Inserisci un'email";
    }elseif(!filter_var($input_email_aziendale,FILTER_VALIDATE_EMAIL)){
        $errors['email_aziendale'] = "L'indirizzo email inserito dev'essere valido";
    }else{
        $email_aziendale = $input_email_aziendale;
    }

    //validazione pw
    $input_password =  (trim($_POST["password"]));
    if(empty($input_password)){
        $errors['password'] = "Attenzione: non hai inserito la password";
    }else{
        $password = $input_password;
    }


    //creo le righe, una con il nome della tabella, una con i valori
    $tab_val = "$tab ("; //nome tabella (
    foreach ($col_name as $col) { //per ogni colonna nella tabella
        $tab_val.= $col.","; //aggiungo il nome della colonna e la virgola
        $params[] = $$col; //aggiunge la variabile ($) che si chiama con il nome della colonna ($col) ai parametri da inserire
    }
    $tab_val = substr($tab_val, 0, -1).")";
    
    // controllo se il codice del supermercato è presente nel database
    $sql_search = "SELECT id_supermercato FROM reparto WHERE id_supermercato = '$id_supermercato' AND nome_reparto = '$nome_reparto'";
    $result = pg_query($conn, $sql_search);
    $row = pg_fetch_array($result);
    if (empty($row[0])) {
        $errors['id_supermercato'] = "Attenzione: la combinazione reparto-supermercato inserita non è presente nel database";
    }


    //controllo se cf è presente nel database
    $sql_check = "SELECT cf FROM dipendente WHERE  cf = '$cf'";
    $result = pg_query($conn, $sql_check);
    $row = pg_fetch_array($result);
    if (empty($row[0])) {
        $errors['cf'] = "Attenzione: il codice fiscale inserito non è presente del database";
    }

    if (strpos($_SERVER['REQUEST_URI'], 'nuovoResponsabile') !== FALSE) {
        //controllo che la chiave non sia già presente nel DB
        $sql_search = "SELECT id_supermercato FROM responsabile WHERE id_supermercato = '$id_supermercato' AND nome_reparto = '$nome_reparto'";
        $result = pg_query($conn, $sql_search);     
        $row = pg_fetch_array($result);     //se la chiave è già presente nel DB la inserisco nella variabile $row
        if (!empty($row[0])) {              //se la variabile non è vuota vuol dire che la chiave è già presente nel db 
            $errors['double'] = "Esiste già un responsabile per questo reparto";
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

        //se l'url che fa la richiesta contiene nuovoResponsabile -> creare un Responsabile -> query insert
        if (strpos($_SERVER['REQUEST_URI'], 'nuovoResponsabile') !== FALSE) {

            $sql = "INSERT INTO $tab_val VALUES ($values)";
            $insert_query = pg_query_params($conn, $sql, $params);

            $header = "../../index.php";

            //se non c'è nuovoResponsabile -> arrivo da modifyPHP
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