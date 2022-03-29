<?php
require (__DIR__."/../config.php");

$tab = 'regali_ritirati';
$key = 'id_regalo';
$key1 = 'id_tessera';
require (__DIR__."/controls_forms/col_names.php");

if($_SERVER["REQUEST_METHOD"] === "POST"){

    //controllo valori e assegnazione

    //validazione id_regalo
    $input_id_regalo = (trim($_POST["id_regalo"]));
    if(empty($input_id_regalo)){
        $errors['id_regalo'] = "Inserisci il codice del regalo";
    }else{
        $id_regalo = $input_id_regalo;
    }
    //validazione id_tessera
    $input_id_tessera = (trim($_POST["id_tessera"]));
    if(empty($input_id_tessera)){
        $errors['id_tessera'] = "Inserisci un numero di tessera";
    }else{
        $id_tessera = $input_id_tessera;
    }
    //data
    $input_data_ritiro = (trim($_POST["data_ritiro"]));
    if(empty($input_data_ritiro)){
        $errors['data_ritiro'] = "Inserisci la data del ritiro";
    }else{
        $data_ritiro = $input_data_ritiro;
    }

    //controllo se id_regalo è nel db
    $sql_search = "SELECT id_regalo FROM regalo WHERE id_regalo = $id_regalo";
    $result = pg_query($conn, $sql_search);
    $row = pg_fetch_array($result);
    if (empty($row[0])) {
        $errors['id_regalo'] = "Attenzione: il codice del regalo inserito non esiste";
    }
    //controllo se id_tessera è nel db
    $sql_search = "SELECT id_tessera FROM tessera_cliente WHERE id_tessera = $id_tessera";
    $result = pg_query($conn, $sql_search);
    $row = pg_fetch_array($result);
    if (empty($row[0])) {
        $errors['id_tessera'] = "Attenzione: il numero di tessera inserito non esiste";
    }

    //controllo che non ci sia già la stessa coppia regalo/tessera
    if (strpos($_SERVER['REQUEST_URI'], 'nuovoRegali_ritirati') !== FALSE) {
        $sql_search = "SELECT id_regalo FROM regali_ritirati WHERE id_regalo = $id_regalo AND id_tessera = $id_tessera;";
        $result = pg_query($conn, $sql_search);
        $row = pg_fetch_array($result);     //se la chiave è già presente nel DB la inserisco nella variabile $row
        if (!empty($row[0])) {              //se la variabile non è vuota vuol dire che la chiave è già presente nel db
            $errors['double'] = "Questa tessera ha già ritirato questo regalo";
        }
    }


    $tab_val = "$tab (";
    foreach ($col_name as $col) {
        $tab_val.= $col.",";
        $params[] = $$col;
    }
    $tab_val = substr($tab_val, 0, -1).")";

    if(!array_filter($errors)){
        if (strpos($_SERVER['REQUEST_URI'], 'nuovoRegali_ritirati') !== false) {
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