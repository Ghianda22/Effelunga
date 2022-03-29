<?php
require (__DIR__."/../config.php");

$tab = 'composizione_prodotto';
$key = 'ingrediente';
$key1 = 'assemblato';
require (__DIR__."/controls_forms/col_names.php");

if($_SERVER["REQUEST_METHOD"] === "POST"){

    //controllo valori e assegnazione

    //validazione ingrediente
    $input_ingrediente = (trim($_POST["ingrediente"]));
    if(empty($input_ingrediente)){
        $errors['ingrediente'] = "Inserisci il codice del prodotto ingrediente";
    }else{
        $ingrediente = $input_ingrediente;
    }
    //validazione assemblato
    $input_assemblato = (trim($_POST["assemblato"]));
    if(empty($input_assemblato)){
        $errors['assemblato'] = "Inserisci il codice del prodotto assemblato";
    }else{
        $assemblato = $input_assemblato;
    }
    //data
    $input_quantita = (trim($_POST["quantita"]));
    if(empty($input_quantita)){
        $errors['quantita'] = "Inserisci la quantità necessaria di questo ingrediente";
    }else{
        $quantita = $input_quantita;
    }

    //controllo se ingrediente è nel db
    $sql_search = "SELECT id_prodotto FROM prodotto WHERE id_prodotto = $ingrediente";
    $result = pg_query($conn, $sql_search);
    $row = pg_fetch_array($result);
    if (empty($row[0])) {
        $errors['ingrediente'] = "Attenzione: il codice del prodotto ingrediente non esiste";
    }
    //controllo se assemblato è nel db
    $sql_search = "SELECT id_prodotto FROM prodotto WHERE id_prodotto = $assemblato";
    $result = pg_query($conn, $sql_search);
    $row = pg_fetch_array($result);
    if (empty($row[0])) {
        $errors['assemblato'] = "Attenzione: il codice del prodotto assemblato non esiste";
    }

    //controllo che non ci sia già la stessa coppia regalo/tessera
    if (strpos($_SERVER['REQUEST_URI'], 'nuovoComposizione_prodotto') !== FALSE) {
        $sql_search = "SELECT ingrediente FROM composizione_prodotto WHERE ingrediente = $ingrediente AND assemblato = $assemblato;";
        $result = pg_query($conn, $sql_search);
        $row = pg_fetch_array($result);     //se la chiave è già presente nel DB la inserisco nella variabile $row
        if (!empty($row[0])) {              //se la variabile non è vuota vuol dire che la chiave è già presente nel db
            $errors['double'] = "Questo ingrediente è già stato inserito per questo prodotto";
        }
    }


    $tab_val = "$tab (";
    foreach ($col_name as $col) {
        $tab_val.= $col.",";
        $params[] = $$col;
    }
    $tab_val = substr($tab_val, 0, -1).")";

    if(!array_filter($errors)){
        if (strpos($_SERVER['REQUEST_URI'], 'nuovoComposizione_prodotto') !== false) {
            //aggiunge tanti $ quanti sono i valori da inserire nella query
            $values = "";
            for ($i = 1; $i <= count($params); $i++) {
                if ($i < count($params)) {
                    $values .= "$" . $i . ",";
                } else {
                    $values .= "$" . $i;
                }
            }
            $sql = "INSERT INTO $tab_val VALUES ($values)";
            echo $sql."<br>";
            print_r($params);
            $insert_query = pg_query_params($conn, $sql, $params);

            $header = "../../index.php";

            //se non c'è nuovoCliente -> arrivo da modifyPHP
        }elseif ($_POST['submit'] === "Modifica") { //se ho cliccato sul pulsante modifica creo la query
            $cond = "$key = ${$key} AND $key1 = ${$key1}";
            array_shift($col_name);
            array_shift($col_name);
            array_shift($params);
            array_shift($params);
            //lista di coppie "chiave = valore"
            $coupled_val = "";
            for ($i = 0; $i < count($params); $i++) { //per ogni valore crea chiave = $1/$2/$3...
                $coupled_val .= "$col_name[$i] = $" . ($i + 1) . ", ";
            }

            $coupled_val = substr($coupled_val, 0, -2);
            //da settare ogni volta
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
