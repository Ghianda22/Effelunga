<div>
    <input type="text" name="id_catalogo" placeholder="ID Catalogo" required value="<?php echo htmlspecialchars($id_catalogo)?>">
    <p class="err"> <?php echo $errors['id_catalogo'];?> </p>
    <input type="text" name="id_supermercato" placeholder="ID supermercato" required value="<?php echo htmlspecialchars($id_supermercato)?>">
    <p class="err"> <?php echo $errors['id_supermercato'];?> </p>
    <p class="err"> <?php echo $errors['double'];?> </p>
</div>