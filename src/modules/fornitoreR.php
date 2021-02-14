<?php
    //valori iniziali per la query
    /* fields = i campi che mi interessano
     * tab = la tabella da cui prendo
     * cond = la condizione che voglio applicare
     * order = l'attributo per cui voglio ordinare
     */

    $tab = "fornitore";
    $fields = "*";
    $cond = "p_iva IS NOT NULL"; //valore base = primary key non è nulla
    $order = "nome";

    include "view_universal/tablePhp.php";

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        include "view_universal/filterPhp.php";
    }
    include "view_universal/filterHtml.php";
    include "view_universal/tableHtml.php";

?>