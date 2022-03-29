<?php

//arrivano tutti i dati sotto forma di stringa
//converto la stringa che arriva in array
//se il primo elemento dell'array è mod allora mostro la form di mod e la riempio
//se il primo elemento che mi arriva è del allora mostro le opzioni di cancellazione

if(array_key_exists('mod',$_POST)){
    //allora è modalità modifica
    session_start();
    $_SESSION['data'] = $_POST['mod'];
    header("Location: view_universal/modifyPhp.php");

}else{
    //modalità elimina
    session_start();
    $_SESSION['data'] = $_POST['del'];
    //stabilire qui la condizione di eliminazione (WHERE $cond) perchè i dati variano da tabella a tabella

    $data = json_decode($_SESSION['data'], true);
    $cond = "id_supermercato = ".$data['row']['id_supermercato']." AND nome_reparto = ".$data['row']['nome_reparto']." AND id_prodotto = ".$data['row']['id_prodotto'];  // QUI DEVI CAMBIARE LA CONDIZIONE
    $_SESSION['cond'] = $cond;
    $_SESSION['tab'] = $data['tab'];
    $_SESSION['header'] = "../../../index.php";

    ?>
    <div>
        <p>Stai per eliminare un prodotto in questo scaffale.</p>
        <form action="view_universal/deletePhp.php" method="POST">
            <p>Sei sicuro di voler continuare?</p>
            <input type="submit" name="submit" value="Elimina">
            <input type="submit" name="submit" value="Annulla">
        </form>
    </div>
<?php
}
?>
