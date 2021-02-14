<?php
    //validazione password
    $input_password = (trim($_POST["password"]));
    if(empty($input_password)){
        $errors['password']= "Inserisci una password";
    }elseif(strlen($input_password) < 8){
        $errors['password']= "La password deve avere almeno 8 caratteri";
    }else{
        $password = $input_password;
    }
?>