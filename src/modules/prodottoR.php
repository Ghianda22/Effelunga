<h1><a href="../../index.php">Effelunga</a></h1>
<?php
    //valori iniziali per la query
    /* fields = i campi che mi interessano
     * tab = la tabella da cui prendo
     * cond = la condizione che voglio applicare
     * order = l'attributo per cui voglio ordinare
     */

    $tab = "prodotto";
    $fields = "*";
    $cond = "id_prodotto IS NOT NULL"; //valore base = primary key non è nulla
    $order = "id_prodotto";

    include "view_universal/tablePhp.php";

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        include "view_universal/filterPhp.php";
    }
    include "view_universal/filterHtml.php";
    include "view_universal/tableHtml.php";

?>
