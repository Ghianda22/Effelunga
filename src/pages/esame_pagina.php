
<?php
include "../config.php";
$campi = ['cf_dipendente', 'mese'];
foreach ($campi as $col){
    $$col = "";
    $errors[$col] = "";
}
//valori iniziali per la query
/* fields = i campi che mi interessano
 * tab = la tabella da cui prendo
 * cond = la condizione che voglio applicare
 * order = l'attributo per cui voglio ordinare
 */
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    //validazione cf_dipendente
    $input_cf_dipendente = (trim($_POST["cf_dipendente"]));
    if(empty($input_cf_dipendente)){
        $errors['cf_dipendente'] = "Inserisci un codice fiscale";
    }else{
        $cf_dipendente = $input_cf_dipendente;
    }
    //validazione mese
    $input_mese = (trim($_POST["mese"]));
    if(empty($input_mese)){
        $errors['mese'] = "Inserisci il codice del mese";
    }else{
        $mese = $input_mese;
    }


    //controllo se cf_dipendente è nel db
    $sql_search = "SELECT cf_dipendente FROM assegnazione WHERE cf_dipendente = '$cf_dipendente'";
    $result = pg_query($conn, $sql_search);
    $row = pg_fetch_array($result);
    if (empty($row[0])) {
        $errors['cf_dipendente'] = "Attenzione: il codice fiscale inserito non esiste";
    }
    //controllo se mese è nel db
    $sql_search = "SELECT mese FROM assegnazione WHERE mese = '$mese'";
    $result = pg_query($conn, $sql_search);
    $row = pg_fetch_array($result);
    if (empty($row[0])) {
        $errors['mese'] = "Attenzione: il codice del mese inserito non esiste";
    }

    if(!array_filter($errors)){
        $tab = "assegnazione";
        $fields = "*";
        $cond = "cf_dipendente = '".$cf_dipendente."' AND mese = '".$mese."' "; //valore base = primary key non è nulla
        $order = "id_obiettivo";
    }
}else{

    $tab = "assegnazione";
    $fields = "*";
    $cond = "cf_dipendente IS NOT NULL"; //valore base = primary key non è nulla
    $order = "cf_dipendente";
}
include "../modules/view_universal/tablePhp.php";


?>

<h1><a href="../../index.php">Effelunga</a></h1>
<form action="esame_pagina.php" method="post">
    <div>
        <input type="text" name="cf_dipendente" placeholder="Codice fiscale junior" required value="<?php echo htmlspecialchars($cf_dipendente)?>">
        <p class="err"> <?php echo $errors['cf_dipendente']; ?> </p>
    </div>
    <div>
        <input type="text" name="mese" placeholder="Codice fiscale junior" required value="<?php echo htmlspecialchars($mese)?>">
        <p class="err"> <?php echo $errors['mese']; ?> </p>
    </div>
    <input type="submit" value="Visualizza">
</form>

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
                <td> <?php
                    if($field === 'non raggiunto'){
                        strtoupper($field);
                    }
                    echo htmlspecialchars($field); ?> </td>
            <?php } ?>
        </tr>
    <?php } ?>
    </tbody>

</table>

<?php include __DIR__."/../templates/footer.php";?>