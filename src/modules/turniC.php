<?php require(__DIR__."/../config.php");
//$cf_err = $cf = $giorno = $inizio_turno = $fine_turno = $confirm = "";
$tab = 'turni';
$key1 = 'cf';
$key2 = 'giorno';

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
    
    // validazione giorno
    $input_giorno =  (trim($_POST["giorno"]));
    if(empty($input_giorno)) {
        $errors['giorno']= "Inserisci il giorno";
    } elseif ($input_giorno != "feriale" && $input_giorno != "festivo") {
        $errors['giorno']= "Attenzione il giorno può essere o feriale o festivo";
    } else {
        $giorno = $input_giorno;
    }
    
    // validazione inizio turno
    $input_inizio_turno =  (trim($_POST["inizio_turno"]));
    if(empty($input_inizio_turno)) {
        $errors['inizio_turno']= "Inserisci l'orario di inizio turno";
    } else if (!is_numeric($input_inizio_turno)) {
        $errors['inizio_turno']= "Non hai inserito l'orario di inizio turno corretto";
    } else {
        $inizio_turno = $input_inizio_turno;
    }

    // validazione fine turno
    $input_fine_turno =  (trim($_POST["fine_turno"]));
    if(empty($input_fine_turno)) {
        $errors['fine_turno']= "Inserisci l'orario di fine turno";
    } else if (!is_numeric($input_fine_turno)) {
        $errors['fine_turno']= "Non hai inserito l'orario di fine turno corretto";
    } else {
        $fine_turno = $input_fine_turno;
    }

    //creo le righe, una con il nome della tabella, una con i valori
    $tab_val = "$tab ("; //nome tabella (
    foreach ($col_name as $col) { //per ogni colonna nella tabella
        $tab_val.= $col.","; //aggiungo il nome della colonna e la virgola
        $params[] = $$col; //aggiunge la variabile ($) che si chiama con il nome della colonna ($col) ai parametri da inserire
    }
    $tab_val = substr($tab_val, 0, -1).")";

    if (strpos($_SERVER['REQUEST_URI'], 'nuovoTurni') !== FALSE){
       
        //controllo se cf è presente nel database
        $sql_check = "SELECT cf FROM dipendente WHERE  cf = '$cf'";
        $result = pg_query($conn, $sql_check);
        $row = pg_fetch_array($result);
        
        if (empty($row[0])) {
            $errors['cf'] = "Attenzione: il codice fiscale inserito non è presente del database";
        }
        
        // Controllo sempre che il turno non sia già stato inserito 
        $sql_check = "SELECT cf FROM turni WHERE  giorno = '$giorno' AND cf = '$cf'";
        $result2 = pg_query($conn, $sql_check);
        $row2 = pg_fetch_array($result2);
        if(!empty($row2[0])){
            $errors['cf'] = "Il turno è già presente nel database.";
        }
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

        //se l'url che fa la richiesta contiene nuovoFornitore -> creare un fornitore -> query insert
        if (strpos($_SERVER['REQUEST_URI'], 'nuovoTurni') !== FALSE) {

            $sql = "INSERT INTO $tab_val VALUES ($values)";
            $insert_query = pg_query_params($conn, $sql, $params);

            $header = "../../index.php";

            //se non c'è nuovoTurni -> arrivo da modifyPHP
        } elseif ($_POST['submit'] === "Modifica") { //se ho cliccato sul pulsante modifica creo la query

            $coupled_val = ""; //lista di coppie "chiave = valore"
            for ($i = 0; $i < count($params); $i++) { //per ogni valore crea chiave = $1/$2/$3...
                $coupled_val .= "$col_name[$i] = $" . ($i + 1) . ", ";
            }
            $coupled_val = substr($coupled_val, 0, -2);
            //da settare ogni volta
            $sql = "UPDATE $tab SET $coupled_val WHERE giorno = '$giorno' AND cf = '$cf';";

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