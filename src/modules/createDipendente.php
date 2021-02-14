<?php
    require_once "config.php";

    //inizializ. variabili
    $nome = $cognome = $email = $password = $tel = $via = $cap = $civico = $citta = $data = "";
    $errors = array('nome' => '', 'cognome' => '', 'email' => '', 'password' => '', 'tel' => '', 'indirizzo' => '');

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //validazione nome
        $input_nome = htmlspecialchars(trim($_POST["nome"]));
        if(empty($input_nome)){
            $errors['nome'] = "Inserisci un nome";
        }elseif (!filter_var($input_nome, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-ZÀ-ú\s]+$/")))){
            $errors['nome'] = "Il nome può contenere solo lettere";
        }else{
            $nome = $input_nome;
        }

        //validazione cognome
        $input_cognome = htmlspecialchars(trim($_POST["cognome"]));
        if(empty($input_cognome)){
            $errors['cognome'] = "Inserisci un cognome";
        }elseif (!filter_var($input_cognome, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-ZÀ-ú\s]+$/")))){
            $errors['cognome'] = "Il cognome può contenere solo lettere";
        }else{
            $cognome = $input_cognome;
        }

        //validazione indirizzo
        $input_via = htmlspecialchars(trim($_POST["via"]));
        $input_civico = htmlspecialchars(trim($_POST["civico"]));
        $input_cap = htmlspecialchars(trim($_POST["cap"]));
        $input_citta = htmlspecialchars(trim($_POST["citta"]));
        if(empty($input_via) || empty($input_civico) || empty($input_cap) || empty($input_citta)){
            $errors['indirizzo'] = "Completa tutti i campi dell'indirizzo";
        }elseif (!is_numeric($input_cap)){
            $errors['indirizzo'] = "Il CAP dev'essere composto solo da numeri";
        }else{
            $via = $input_via;
            $civico = $input_civico;
            $cap = $input_cap;
            $citta = $input_citta;
        }

        //validazione mail
        $input_email = htmlspecialchars(trim($_POST["email"]));
        if(empty($input_email)){
            $errors['email'] =  "Inserisci un'email";
        }elseif(!filter_var($input_email,FILTER_VALIDATE_EMAIL)){
            $errors['email'] = "L'indirizzo email inserito dev'essere valido";
        }else{
            $email = $input_email;
        }

        //validazione tel
        $input_tel = htmlspecialchars(trim($_POST["tel"]));
        if(empty($input_tel)){
            $errors['tel'] = "Inserisci un recapito telefonico valido";
        }elseif(!is_numeric($input_tel)){
            $errors['tel'] = "Il numero di telefono inserito non e' valido";
        }else{
            $tel = $input_tel;
        }

        //validazione password
        $input_password = htmlspecialchars(trim($_POST["psw"]));
        if(empty($input_password)){
            $errors['password']= "Inserisci una password";
        }elseif(strlen($input_password) < 8){
            $errors['password']= "La password deve avere almeno 8 caratteri";
        }else{
            $password = $input_password;
        }

        $data = $_POST["data"];


        if(!array_filter($errors)){
            //preparazione comando sql
            $sql = "INSERT INTO tessera_cliente (nome, cognome, telefono, data_nascita, email, via, civico, cap, citta, password) VALUES ($1,$2,$3,$4,$5,$6,$7,$8,$9,$10)";

            $insert_query = pg_query_params($conn, $sql, array($nome,$cognome, $tel, $data, $email, $via, $civico, $cap, $citta, $password));

            if($insert_query){
                echo "Cliente registrato con successo";
                header("Location: index.php");
            }else{
                exit("C'è stato un errore: ".pg_last_error($conn));
            }
        }
    }
?>