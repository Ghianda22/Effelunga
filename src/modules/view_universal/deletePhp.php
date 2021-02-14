<?php
require "../../config.php";
session_start();
$header = $_SESSION['header'];

if($_POST['submit'] === "Elimina"){
    $tab = $_SESSION['tab'];
    $cond = $_SESSION['cond'];
    $sql = "DELETE FROM $tab WHERE $cond";
    $del_query = pg_query_params($conn,$sql,array());
    if ($del_query) {} else {
        exit("C'è stato un errore: " . pg_last_error($conn));
    }
}
header("Location: $header");

?>