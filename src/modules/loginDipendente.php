<?php
    require("src/config.php");
    $cf = $cf_err = "";
    session_start();
    if(isset($_POST['cf'])) {
        $cf = trim($_POST['cf']);
        if(empty($cf)) {
            $cf_err= "Inserisci il Codice Fiscale";
        } elseif (strlen($cf) > 16) {
            $cf_err= "Cofice Fiscale non è della lughezza giusta";
        } else {
            //controllo se cf è presente nel database
            $sql = "SELECT cf FROM dipendente WHERE  cf = '$cf'";
            $result = pg_query($conn, $sql);
            if(!$result){ // FORSE QUESTO IF è INUTILE
                $nome_err = "C'è stato un errore.";
            }
            $row = pg_fetch_array($result);
            if (!empty($row[0])){
                //accesso all' AREA DIPENDENTI
                $_SESSION['cf'] = $cf;
                header('Location: src/pages/areaDipendenti.php');
            } else {
                $cf_err = "Il codice fiscale inserito non è presente nel database";
            }
        }
    }
?>

