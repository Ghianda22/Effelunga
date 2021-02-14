<?php
    //validazione indirizzo
    $input_via = trim($_POST["via"]);
    $input_civico = trim($_POST["civico"]);
    $input_cap = trim($_POST["cap"]);
    $input_citta = trim($_POST["citta"]);
    if(empty($input_via) || empty($input_civico) || empty($input_cap) || empty($input_citta)){
        $errors['cap'] = "Completa tutti i campi dell'indirizzo";
    }elseif (!is_numeric($input_cap)){
        $errors['cap'] = "Il CAP dev'essere composto solo da numeri";
    }else{
        $via = $input_via;
        $civico = $input_civico;
        $cap = $input_cap;
        $citta = $input_citta;
    }

?>
