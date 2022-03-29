<?php
require (__DIR__."/../config.php");

$tab = 'fornitura';
$key = 'p_iva';
$key1 = 'id_prodotto';
require (__DIR__."/controls_forms/col_names.php");

if($_SERVER["REQUEST_METHOD"] === "POST"){

    //CONTROLLO VALORI E ASSEGNAZIONE

    //validazione p_iva
    $input_p_iva = (trim($_POST["p_iva"]));
    if(empty($input_p_iva)){
        $errors['p_iva'] = "Inserisci un p_iva";
    }else{
        $p_iva = $input_p_iva;
    }
    //validazione id_prodotto
    $input_id_prodotto = (trim($_POST["id_prodotto"]));
    if(empty($input_id_prodotto)){
        $errors['id_prodotto'] = "Inserisci un id prodotto";
    }else{
        $id_prodotto = $input_id_prodotto;
    }
    //validazione tempo di consegna
    $input_tempo_consegna = (trim($_POST["tempo_consegna"]));
    if(empty($input_tempo_consegna)){
        $errors['tempo_consegna'] = "Inserisci il tempo di consegna";
    }else{
        $tempo_consegna = $input_tempo_consegna;
    }

    //validazione prezzo fornitore
    $input_prezzo_fornitore = (trim($_POST["prezzo_fornitore"]));
    if(empty($input_prezzo_fornitore)){
        $errors['prezzo_fornitore'] = "Inserisci un prezzo_fornitore";
    }else{
        $prezzo_fornitore = $input_prezzo_fornitore;
    }
    //validazione codice_esterno
    $input_codice_esterno = (trim($_POST["codice_esterno"]));
    if(empty($input_codice_esterno)){
        $errors['codice_esterno'] = "Inserisci il codice esterno del prodotto";
    }else{
        $codice_esterno = $input_codice_esterno;
    }

    //controllo se p_iva è nel db
    $sql_search = "SELECT p_iva FROM fornitore WHERE p_iva = '$p_iva'";
    $result = pg_query($conn, $sql_search);
    $row = pg_fetch_array($result);
    if (empty($row[0])) {
        $errors['p_iva'] = "Attenzione: questa partita iva non è collegata a nessun fornitore";
    }
    //controllo se id_prodotto è nel db
    $sql_search = "SELECT id_prodotto FROM prodotto WHERE id_prodotto = $id_prodotto";
    $result = pg_query($conn, $sql_search);
    $row = pg_fetch_array($result);
    if (empty($row[0])) {
        $errors['id_prodotto'] = "Attenzione: il codice del prodotto inserito non esiste";
    }

    //controllo che non ci sia già la stessa coppia fornitore/prodotto
    if (strpos($_SERVER['REQUEST_URI'], 'nuovoFornitura') !== FALSE) {
        $sql_search = "SELECT p_iva FROM fornitura WHERE p_iva = '$p_iva' AND id_prodotto = $id_prodotto;";
        $result = pg_query($conn, $sql_search);
        $row = pg_fetch_array($result);     //se la chiave è già presente nel DB la inserisco nella variabile $row
        if (!empty($row[0])) {              //se la variabile non è vuota vuol dire che la chiave è già presente nel db
            $errors['double'] = "Questo prodotto risulta già fornito da questo fornitore";
        }
    }


    $tab_val = "$tab (";
    foreach ($col_name as $col) {
        $tab_val.= $col.",";
        $params[] = $$col;
    }
    $tab_val = substr($tab_val, 0, -1).")";

    if(!array_filter($errors)){
        if (strpos($_SERVER['REQUEST_URI'], 'nuovoFornitura') !== false) {
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
            $cond = "$key = '${$key}' AND $key1 = ${$key1}";
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
