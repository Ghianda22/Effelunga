<?php
require (__DIR__."/../config.php");

$tab = 'catalogo_regali';
$key = 'id_catalogo';
$key1 = 'id_regalo';
require (__DIR__."/controls_forms/col_names.php");

if($_SERVER["REQUEST_METHOD"] === "POST"){

    //controllo valori e assegnazione

    //validazione id_catalogo
    $input_id_catalogo = (trim($_POST["id_catalogo"]));
    if(empty($input_id_catalogo)){
        $errors['id_catalogo'] = "Inserisci un numero di catalogo";
    }else{
        $id_catalogo = $input_id_catalogo;
    }
    //validazione id_regalo
    $input_id_regalo = (trim($_POST["id_regalo"]));
    if(empty($input_id_regalo)){
        $errors['id_regalo'] = "Inserisci il codice del regalo";
    }else{
        $id_regalo = $input_id_regalo;
    }


    //controllo se id_catalogo è nel db
    $sql_search = "SELECT id_catalogo FROM catalogo WHERE id_catalogo = $id_catalogo";
    $result = pg_query($conn, $sql_search);
    $row = pg_fetch_array($result);
    if (empty($row[0])) {
        $errors['id_catalogo'] = "Attenzione: il numero di catalogo inserito non esiste";
    }
    //controllo se id_regalo è nel db
    $sql_search = "SELECT id_regalo FROM regalo WHERE id_regalo = $id_regalo";
    $result = pg_query($conn, $sql_search);
    $row = pg_fetch_array($result);
    if (empty($row[0])) {
        $errors['id_regalo'] = "Attenzione: il codice del regalo inserito non esiste";
    }


    //controllo che non ci sia già la stessa coppia regalo/catalogo
    if (strpos($_SERVER['REQUEST_URI'], 'nuovoCatalogo_regali') !== FALSE) {
        $sql_search = "SELECT id_regalo FROM regali_ritirati WHERE id_regalo = $id_regalo AND id_catalogo = $id_catalogo;";
        $result = pg_query($conn, $sql_search);
        $row = pg_fetch_array($result);     //se la chiave è già presente nel DB la inserisco nella variabile $row
        if (!empty($row[0])) {              //se la variabile non è vuota vuol dire che la chiave è già presente nel db
            $errors['double'] = "Questo regalo è già presente in questo catalogo";
        }
    }


    $tab_val = "$tab (";
    foreach ($col_name as $col) {
        $tab_val.= $col.",";
        $params[] = $$col;
    }
    $tab_val = substr($tab_val, 0, -1).")";

    if(!array_filter($errors)){
        if (strpos($_SERVER['REQUEST_URI'], 'nuovoCatalogo_regali') !== false) {
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