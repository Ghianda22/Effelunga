<?php
    //validazione nome
    $input_nome = (trim($_POST["nome"]));
    if(empty($input_nome)){
        $errors['nome'] = "Inserisci un nome";
    }elseif (!filter_var($input_nome, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-ZÀ-ú\s]+$/")))){
        $errors['nome'] = "Il nome può contenere solo lettere";
    }else{
        $nome = $input_nome;
    }

    //validazione cognome
    $input_cognome = (trim($_POST["cognome"]));
    if(empty($input_cognome)){
        $errors['cognome'] = "Inserisci un cognome";
    }elseif (!filter_var($input_cognome, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-ZÀ-ú\s]+$/")))){
        $errors['cognome'] = "Il cognome può contenere solo lettere";
    }else{
        $cognome = $input_cognome;
    }
?>
