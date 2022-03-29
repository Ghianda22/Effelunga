<?php
session_start();
if(isset($_SESSION['data'])) {

    //$temp = str_replace("§", "'", $_SESSION['data']);
    $data = json_decode($_SESSION['data'], true);
    $tab = $data['tab'];
    $data = $data['row'];

    if(isset($_SESSION['key'])){
        $_SESSION['key_val'] = $data[$_SESSION['key']];
        unset($_SESSION['key']);
    }

    $keys = array_keys($data);
    foreach ($keys as $key) {
        $$key = $data[$key];
        $errors[$key] = "";
    }

    $errors['double'] = "";
    $_SESSION['tab'] = $tab;

    $_SERVER['REQUEST_METHOD'] = 'GET';
    unset($_SESSION['data']);
}else{
    $tab = $_SESSION['tab'];
    require "../$tab"."C.php";
}
require "../../templates/head.php";

?>

<div class="container mt-3">
    <h1><a href="../../../index.php">Effelunga</a></h1>
    <form action="./modifyPhp.php" method="POST">
        <?php
            require "../../pages/forms/$tab"."Form.php";
            require "../$tab"."C.php";
        ?>
        <input type="submit" name="submit" value="Modifica">
        <input type="submit" name="submit" value="Annulla">
    </form>
</div>

