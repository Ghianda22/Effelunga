<?php
require (__DIR__."/../config.php");

$tab = 'regalo';
$key = 'id_regalo';
require (__DIR__."/controls_forms/col_names.php");

if($_SERVER["REQUEST_METHOD"] === "POST"){

    //controllo valori e assegnazione

    //validazione nome
    $input_nome = (trim($_POST["nome"]));
    if(empty($input_nome)){
        $errors['nome'] = "Inserisci un nome";
    }else{
        $nome = $input_nome;
    }
    $input_punti = (trim($_POST["punti"]));
    if(empty($input_punti)){
        $errors['punti'] = "Inserisci un valore di punti valido";
    }else{
        $punti = $input_punti;
    }
    $input_disponibilita = (trim($_POST["disponibilita"]));
    if(empty($input_disponibilita)){
        $errors['disponibilita'] = "Inserisci una quantità valida";
    }else{
        $disponibilita = $input_disponibilita;
    }
    $descrizione = trim($_POST['descrizione']);

    $tab_val = "$tab (";
    foreach ($col_name as $col) {
        if($col === $key){
            continue;
        }
        $tab_val.= $col.",";
        $params[] = $$col;
    }
    $tab_val = substr($tab_val, 0, -1).")";

    if(!array_filter($errors)){
        if (strpos($_SERVER['REQUEST_URI'], 'nuovoRegalo') !== false) {
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
            $id_regalo = $_SESSION['key_val'];
            $cond = "$key = ${$key}";
            array_shift($col_name);
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