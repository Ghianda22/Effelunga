<?php
require (__DIR__."/../config.php");

$tab = 'dipendente';
$key = 'cf';

require (__DIR__."/controls_forms/col_names.php");

if($_SERVER["REQUEST_METHOD"] === "POST") {

   // validazione cf
   $input_cf =  (trim($_POST["cf"]));
   if(empty($input_cf)) {
       $errors['cf']= "Inserisci il Codice Fiscale";
   } elseif (strlen($input_cf) > 16) {
       $errors['cf']= "Cofice Fiscale non è della lughezza giusta";
   } else {
       $cf = $input_cf;
   }

    //validazione nome
    $input_nome =  (trim($_POST["nome"]));
    if(empty($input_nome)){
        $errors['nome'] = "Inserisci il nome del dipendente ";
    }else{
        $nome = $input_nome;
    }

    //validazione cognome
    $input_cognome =  (trim($_POST["cognome"]));
    if(empty($input_cognome)){
        $errors['cognome'] = "Inserisci il cognome del dipendente ";
    }else{
        $cognome = $input_cognome;
    }

    require (__DIR__."/controls_forms/email_tel.php");
    require (__DIR__."/controls_forms/address.php");

    $data_nascita =  (trim($_POST["data_nascita"]));
    $data_assunzione =  (trim($_POST["data_assunzione"]));
    $stipendio =  (trim($_POST["stipendio"]));

    //creo le righe, una con il nome della tabella, una con i valori
    $tab_val = "$tab ("; //nome tabella (
    foreach ($col_name as $col) { //per ogni colonna nella tabella
        $tab_val.= $col.","; //aggiungo il nome della colonna e la virgola
        $params[] = $$col; //aggiunge la variabile ($) che si chiama con il nome della colonna ($col) ai parametri da inserire
    }
    $tab_val = substr($tab_val, 0, -1).")";
    //$tab = "dipendente (cf, nome, cognome, data_nascita, telefono, email, via, cap, citta, civico, data_assunzione, stipendio)";
    //$params = array($cf, $nome, $cognome, $data_nascita, $tel, $email, $via, $cap, $citta, $civico, $data_assunzione, $stipendio);

    //query di controllo, se ci sono altri con la stessa chiave, o con altri parametri
    $cond = "$key = '${$key}'";
    if (strpos($_SERVER['REQUEST_URI'], 'nuovoDipendente') !== FALSE){
        $sql_check = "SELECT $key FROM $tab WHERE $cond;";
        $insert_check = pg_query_params($conn, $sql_check, array());
        if(pg_num_rows($insert_check) != 0) {
            $errors['double'] = "Esiste già un dipendente con questo codice fiscale";
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

        //se l'url che fa la richiesta contiene nuovoDipendente -> creare un dipendente -> query insert
        if (strpos($_SERVER['REQUEST_URI'], 'nuovoDipendente') !== FALSE) {

            $sql = "INSERT INTO $tab_val VALUES ($values)";
            $insert_query = pg_query_params($conn, $sql, $params);

            $header = "../../index.php";

            //se non c'è nuovoDipendente -> arrivo da modifyPHP
        } elseif ($_POST['submit'] === "Modifica") { //se ho cliccato sul pulsante modifica creo la query

            $coupled_val = ""; //lista di coppie "chiave = valore"
            for ($i = 0; $i < count($params); $i++) { //per ogni valore crea chiave = $1/$2/$3...
                $coupled_val .= "$col_name[$i] = $" . ($i + 1) . ", ";
            }
            $coupled_val = substr($coupled_val, 0, -2);

            //da settare ogni volta
            $cond = "cf = '$cf'";
            $sql = "UPDATE $tab SET $coupled_val WHERE $cond;";

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