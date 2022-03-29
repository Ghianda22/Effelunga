<div>
    <input type="text" name="id_catalogo" placeholder="ID Catalogo" required value="<?php echo htmlspecialchars($id_catalogo)?>">
    <p class="err"> <?php echo $errors['id_catalogo'];?> </p>
    <input type="text" name="id_regalo" placeholder="ID regalo" required value="<?php echo htmlspecialchars($id_regalo)?>">
    <p class="err"> <?php echo $errors['id_regalo'];?> </p>
    <p class="err"> <?php echo $errors['double'];?> </p>
</div>