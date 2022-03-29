<?php
    require("../config.php");

    $input_email = $email = $psw =  $pw_err = $email_err = "";

    if (isset($_POST['email']) && isset($_POST['psw'])) {
        $psw = $_POST['psw'];
        $input_email =  (trim($_POST["email"]));
        if(empty($input_email)){
            $email_err =  "Inserisci un'email";
        }elseif(!filter_var($input_email,FILTER_VALIDATE_EMAIL)){
            $email_err = "L'indirizzo email inserito dev'essere valido";
        }else{
            $email = $input_email;
        }

        $sql = "SELECT email_aziendale, password, nome_reparto FROM responsabile WHERE email_aziendale = '$email'";
        $result = pg_query($conn, $sql);

        $row = pg_fetch_array($result);

        if(!empty($row[0]) && $row[1] == $psw){
            if($row[2] == 'amministrazione'){
                header("Location: ../pages/amministrazione.php");
            } elseif ($row[2] == 'marketing'){
                header("Location: ../pages/marketing.php");
            } elseif ($row[2] == 'magazzino'){
                header("Location: ../pages/magazzino.php");
            } elseif ($row[2] == 'acquisti'){
                header("Location: ../pages/acquisti.php");
            } elseif ($row[2] == 'vendite'){
                header("Location: ../pages/vendite.php");
            }
        } else {
            $pw_err = "La password o la mail inserite non sono valide";
        }
    }
