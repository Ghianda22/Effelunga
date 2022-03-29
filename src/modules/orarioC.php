<?php
require (__DIR__."/../config.php");
//$confirm = $id_supermercato = $id_err = $giorno = $apertura = $chiusura = "";
$tab = 'orario';
$key1 = 'id_supermercato';
$key2 = 'giorno';

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

    // validazione giorno
    $input_giorno =  (trim($_POST["giorno"]));
    if(empty($input_giorno)) {
        $errors['giorno']= "Inserisci il giorno";
    } elseif ($input_giorno != "feriale" && $input_giorno != "festivo") {
        $errors['giorno']= "Attenzione il giorno può essere o feriale o festivo";
    } else {
        $giorno = $input_giorno;
    }

    // validazione apertura
    $input_apertura =  (trim($_POST["apertura"]));
    if(empty($input_apertura)) {
        $errors['apertura']= "Inserisci l'orario di apertura";
    } else if (!is_numeric($input_apertura)) {
        $errors['apertura']= "Non hai inserito l'orario di apertura corretto";
    } else {
        $apertura = $input_apertura;
    }

    // validazione fine turno
    $input_chiusura =  (trim($_POST["chiusura"]));
    if(empty($input_chiusura)) {
        $errors['chiusura']= "Inserisci l'orario di chiusura";
    } else if (!is_numeric($input_chiusura)) {
        $errors['chiusura']= "Non hai inserito l'orario di chiusura corretto";
    } else {
        $chiusura = $input_chiusura;
    }

    //creo le righe, una con il nome della tabella, una con i valori
    $tab_val = "$tab ("; //nome tabella (
    foreach ($col_name as $col) { //per ogni colonna nella tabella
        $tab_val.= $col.","; //aggiungo il nome della colonna e la virgola
        $params[] = $$col; //aggiunge la variabile ($) che si chiama con il nome della colonna ($col) ai parametri da inserire
    }
    $tab_val = substr($tab_val, 0, -1).")";


    if (strpos($_SERVER['REQUEST_URI'], 'nuovoOrario') !== FALSE) {
        // controllo le il codice del supermercato è presente nel database
        $sql_search = "SELECT id_supermercato FROM supermercato WHERE id_supermercato = '$id_supermercato'";
        $result = pg_query($conn, $sql_search);
        $row = pg_fetch_array($result);
        
        if (empty($row[0])) {
            $errors['id_supermercato'] = "Il codice inserito non è presente nel database";
        }

        //controllo che la chiave non sia già presente nel DB
        $sql_search = "SELECT id_supermercato FROM orario WHERE id_supermercato = '$id_supermercato' AND giorno = '$giorno'";
        $result = pg_query($conn, $sql_search);     
        $row = pg_fetch_array($result);     //se la chiave è già presente nel DB la inserisco nella variabile $row
        if (!empty($row[0])) {              //se la variabile non è vuota vuol dire che la chiave è già presente nel db 
            $errors['giorno'] = "L'orario inserito è già presente nel database";
        } 
    }

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

        //se l'url che fa la richiesta contiene nuovoOrario -> creare un Orario -> query insert
        if (strpos($_SERVER['REQUEST_URI'], 'nuovoOrario') !== FALSE) {

            $sql = "INSERT INTO $tab_val VALUES ($values)";
            $insert_query = pg_query_params($conn, $sql, $params);

            $header = "../../index.php";

        //se non c'è nuovoOrario -> arrivo da modifyPHP
        } elseif ($_POST['submit'] === "Modifica") { //se ho cliccato sul pulsante modifica creo la query

            $coupled_val = ""; //lista di coppie "chiave = valore"
            for ($i = 0; $i < count($params); $i++) { //per ogni valore crea chiave = $1/$2/$3...
                $coupled_val .= "$col_name[$i] = $" . ($i + 1) . ", ";
            }
            $coupled_val = substr($coupled_val, 0, -2);
            //da settare ogni volta
            $cond1 = "id_supermercato = '$id_supermercato'";
            $cond2 = "giorno = '$giorno'";
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
