<?php
    require (__DIR__."/../../config.php");

    $sql_data = "SELECT ${fields} FROM ${tab} WHERE ${cond} ORDER BY ${order}";

    $data_query = pg_query_params($conn, $sql_data, array());
    if($data_query){
        //se la query funziona, creo un array e lo riempio con altri array, uno per ogni riga della tabella
        $data = [];
        for ($i = 0; $i < pg_num_rows($data_query); $i++){
            array_push($data, pg_fetch_array($data_query, $i,PGSQL_ASSOC));
        }
    }else{
        exit("C'è stato un errore: ".pg_last_error($conn));
    }
    //array con il nome delle colonne della query
    $col_name = array_keys($data[0]);
    //include "filterPhp.php";


?>
