<?php
    $conn = pg_connect("host=localhost port=5432 dbname=effelunga user=postgres password=sas");
    if(!$conn ){
        die("Connection to DB failed");
    }
?>
