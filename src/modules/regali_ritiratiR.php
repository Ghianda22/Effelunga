<h1><a href="../../index.php">Effelunga</a></h1>
<?php

$tab = "regali_ritirati";
$fields = "*";
$cond = "id_tessera IS NOT NULL"; //valore base = primary key non è nulla
$order = "id_tessera";

include "view_universal/tablePhp.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    include "view_universal/filterPhp.php";
}
include "view_universal/filterHtml.php";
include "view_universal/tableHtml.php";

?>