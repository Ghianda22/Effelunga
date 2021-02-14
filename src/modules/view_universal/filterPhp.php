<?php
    //definisce l'ordine delle colonne
    $order = "";
    foreach ($col_name as $col){
        if(isset($_POST["$col"])){
            if(($select = $_POST["$col"]) != ""){
                $order .= "$col"." $select, ";
            }
        }

    }
    $order = substr($order, 0, -2);

?>
