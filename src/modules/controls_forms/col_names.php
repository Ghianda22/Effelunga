<?php
$sql_col = "SELECT column_name FROM information_schema.columns WHERE table_name = $1 ";
$col_query = pg_query_params($conn, $sql_col, array($tab));
if($col_query){
    //nomi delle colonne
    $col_name = [];
    //nomi formattati
    //$f_col_name =[];
    for ($i = 0; $i < pg_num_rows($col_query); $i++) {
        $col_name[] = pg_fetch_array($col_query, $i, PGSQL_NUM)[0];
        // $f_col_name[] = strtoupper(str_replace("_", ". ", $col_name[$i]));
    }
}else{
    exit("C'è stato un errore: ".pg_last_error($conn));
}
//inizializzo le variabili per i moduli create
foreach ($col_name as $col){
    $$col = "";
    $errors[$col] = "";
}
$errors['double'] = "";
?>