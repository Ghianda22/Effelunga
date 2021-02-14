<?php
    //validazione email
    $input_email = (trim($_POST["email"]));
    if(empty($input_email)){
        $errors['email'] =  "Inserisci un'email";
    }elseif(!filter_var($input_email,FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "L'indirizzo email inserito dev'essere valido";
    }else{
        $email = $input_email;
    }

    //validazione tel
    $input_tel = (trim($_POST["telefono"]));
    if(empty($input_tel)){
        $errors['telefono'] = "Inserisci un recapito telefonico valido";
    }elseif(!is_numeric($input_tel) || strlen($input_tel)<3){
        $errors['telefono'] = "Il numero di telefono inserito non e' valido";
    }else{
        $telefono = $input_tel;
    }
?>