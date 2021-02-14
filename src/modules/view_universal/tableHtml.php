<?php require (__DIR__."/tablePhp.php"); ?>

<table class="table table-sm table-striped table-hover table-bordered border-secondary table-responsive align-middle">
    <thead class="border-2">
        <?php foreach ($col_name as $col){
            //per ogni nome di colonna formatto e creo la cella nella tabella
            $col = strtoupper(str_replace("_", ". ", $col)); ?>
            <th class="col "> <?php echo htmlspecialchars($col) ?> </th>
        <?php } ?>
        <th colspan="2" class="text-center">Azioni</th>
    </thead>
    <tbody>

    <?php for ($i = 0; $i < pg_num_rows($data_query); $i++){//per ogni riga della query?>
        <tr> <?php foreach ($data[$i] as $field){ //per ogni elemento della riga ($data[$i] è una riga)?>
            <td> <?php echo htmlspecialchars($field); ?> </td>
            <?php } ?>
            <form action="<?php echo "../modules/$tab"."UD.php"; ?>" method="POST">
                <?php
                    //all'array riga aggiungo il valore tabella, trasformo tutto in una stringa formato json e lo assegno come valore
                    //uso json perchè è facile da convertire e riconvertire
                    $to_pass = ['tab'=> $tab, 'row' => $data[$i]];
                    $to_pass = json_encode($to_pass, JSON_HEX_APOS | JSON_HEX_QUOT);
                    //$to_pass = str_replace("'", "§", $to_pass);
                ?>
                <td><button type="submit" name="mod" value='<?php echo($to_pass); ?>' class="mod rounded-3">Modifica</button></td>
                <td><button type="submit" name="del" value='<?php echo($to_pass); ?>' class="delete rounded-3">Elimina</button></td>
            </form>
        </tr>
    <?php } ?>
    </tbody>

</table>

<?php include (__DIR__."/filterPhp.php");?>