<?php
require_once "config.php";

//inizializ. variabili
$nome = $cognome = $email = $password = $tel = $via = $cap = $civico = $citta = $data = "";
$nome_err = $cognome_err = $email_err = $indirizzo_err = $tel_err = $pass_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    //validazione nome
    $input_nome = trim($_POST["nome"]);
    if(empty($input_nome)){
        $nome_err = "Inserisci un nome";
    }elseif (!filter_var($input_nome, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $nome_err = "Il nome può contenere solo lettere";
    }else{
        $nome = $input_nome;
    }

    //validazione cognome
    $input_cognome = trim($_POST["cognome"]);
    if(empty($input_cognome)){
        $cognome_err = "Inserisci un cognome";
    }elseif (!filter_var($input_cognome, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $cognome_err = "Il cognome può contenere solo lettere";
    }else{
        $cognome = $input_cognome;
    }

    //validazione indirizzo
    $input_via = trim($_POST["via"]);
    $input_civico = trim($_POST["civico"]);
    $input_cap = trim($_POST["cap"]);
    $input_citta = trim($_POST["citta"]);
    if(empty($input_via) || empty($input_civico) || empty($input_cap) || empty($input_citta)){
        $indirizzo_err = "Completa tutti i campi dell'indirizzo";
    }elseif (!is_numeric($input_cap)){
        $indirizzo_err = "Il CAP dev'essere composto solo da numeri";
    }else{
        $via = $input_via;
        $civico = $input_civico;
        $cap = $input_cap;
        $citta = $input_citta;
    }

    //validazione mail
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Inserisci un'email valida";
    }else{
        $email = $input_email;
    }

    //validazione tel
    $input_tel = trim($_POST["tel"]);
    if(empty($input_tel)){
        $tel_err = "Inserisci un recapito telefonico valido";
    }elseif(!is_numeric($input_tel)){
        $tel_err = "Il numero di telefono inserito non e' valido";
    }else{
        $tel = $input_tel;
    }

    //validazione password
    $input_password = trim($_POST["psw"]);
    if(empty($input_password)){
        $pass_err = "Inserisci una password";
    }else{
        $password = $input_password;
    }

    $data = $_POST["data"];


    if(empty($nome_err) && empty($cognome_err) && empty($indirizzo_err) && empty($email_err) && empty($tel_err) && empty($pass_err)){
        //preparazione comando sql
        $sql = "INSERT INTO tessera_cliente (nome, cognome, telefono, data_nascita, email, via, civico, cap, citta, password) VALUES ($1,$2,$3,$4,$5,$6,$7,$8,$9,$10)";

        $insert_query = pg_query_params($conn, $sql, array($nome,$cognome, $tel, $data, $email, $via, $civico, $cap, $citta, $password));

        if($insert_query){
            echo "Cliente registrato con successo";
        }else{
            exit("C'è stato un errore: ".pg_last_error($conn));
            }

    }else{
        echo $nome_err;
        echo "</br>";
        echo $cognome_err;
        echo "</br>";
        echo $email_err;
        echo "</br>";
        echo $indirizzo_err;
        echo "</br>";
        echo $tel_err;
        echo "</br>";
        echo $pass_err;
        echo "</br>";
    }



}
?>