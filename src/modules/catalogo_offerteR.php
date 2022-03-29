<h1><a href="../../index.php">Effelunga</a></h1>
<p>Per modificare una voce della tabella bisogna eliminarla e reinserirla</p>
<?php

$tab = "catalogo_offerte";
$fields = "*";
$cond = "id_catalogo IS NOT NULL"; //valore base = primary key non è nulla
$order = "id_catalogo";

include "view_universal/tablePhp.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    include "view_universal/filterPhp.php";
}
include "view_universal/filterHtml.php";
include "view_universal/tableHtml.php";

?>