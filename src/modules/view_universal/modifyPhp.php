<?php
session_start();
if(isset($_SESSION['data'])) {

    //$temp = str_replace("§", "'", $_SESSION['data']);
    $data = json_decode($_SESSION['data'], true);
    $tab = $data['tab'];
    $data = $data['row'];

    $_SESSION['key_val'] = $data[$_SESSION['key']];

    foreach ($data as $value) {
        $key = array_search($value, $data);
        $$key = $value;
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

<form action="./modifyPhp.php" method="POST">
    <?php
        require "../../pages/forms/$tab"."Form.php";
        require "../$tab"."C.php";
    ?>
    <input type="submit" name="submit" value="Modifica">
    <input type="submit" name="submit" value="Annulla">
</form>


</div>

