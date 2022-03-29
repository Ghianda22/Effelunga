<?php
    //valori iniziali per la query
    /* fields = i campi che mi interessano
     * tab = la tabella da cui prendo
     * cond = la condizione che voglio applicare
     * order = l'attributo per cui voglio ordinare
     */

    $tab = "prodotti_venduti";
    $fields = "*";
    $cond = "id_scontrino IS NOT NULL"; //valore base = primary key non è nulla
    $order = "id_scontrino";

    include "view_universal/tablePhp.php";

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        include "view_universal/filterPhp.php";
    }
    include "view_universal/filterHtml.php";
    include __DIR__."/../templates/head.php";
?>

<table class="table table-sm table-striped table-hover table-bordered border-secondary table-responsive align-middle">
    <thead class="border-2">
        <?php foreach ($col_name as $col){
            //per ogni nome di colonna formatto e creo la cella nella tabella
            $col = strtoupper(str_replace("_", ". ", $col)); ?>
            <th class="col "> <?php echo htmlspecialchars($col) ?> </th>
        <?php } ?>
    </thead>
    <tbody>

    <?php for ($i = 0; $i < pg_num_rows($data_query); $i++){//per ogni riga della query?>
        <tr> <?php foreach ($data[$i] as $field){ //per ogni elemento della riga ($data[$i] è una riga)?>
            <td> <?php echo htmlspecialchars($field); ?> </td>
            <?php } ?>
        </tr>
    <?php } ?>
    </tbody>

</table>

<?php include __DIR__."/../templates/footer.php";?>