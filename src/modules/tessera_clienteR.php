<?php

$tab = "tessera_cliente";
$fields = "*";
$cond = "id_tessera IS NOT NULL"; //valore base = primary key non è nulla
$order = "nome";

include "view_universal/tablePhp.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    include "view_universal/filterPhp.php";
}
include "view_universal/filterHtml.php";
include "view_universal/tableHtml.php";

?>