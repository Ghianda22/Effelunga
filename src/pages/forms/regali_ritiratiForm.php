<div>
    <input type="text" name="id_tessera" placeholder="ID tessera" required value="<?php echo htmlspecialchars($id_tessera)?>">
    <p class="err"> <?php echo $errors['id_tessera'];?> </p>
    <input type="text" name="id_regalo" placeholder="ID regalo" required value="<?php echo htmlspecialchars($id_regalo)?>">
    <p class="err"> <?php echo $errors['id_regalo'];?> </p>
    <p class="err"> <?php echo $errors['double'];?> </p>
</div>
<div>
    <label for="data_ritiro">Data del ritiro: </label>
    <input type="date" name="data_ritiro" id="data_ritiro" required value="<?php echo htmlspecialchars($data_ritiro)?>">
</div>