<div>
    <input type="text" name="ingrediente" placeholder="Ingrediente" required value="<?php echo htmlspecialchars($ingrediente)?>">
    <p class="err"> <?php echo $errors['ingrediente'];?> </p>
    <input type="text" name="assemblato" placeholder="Prodotto assemblato" required value="<?php echo htmlspecialchars($assemblato)?>">
    <p class="err"> <?php echo $errors['assemblato'];?> </p>
    <p class="err"> <?php echo $errors['double'];?> </p>
</div>
<div>
    <label for="quantita">Quantità: </label>
    <input type="number" min="1" name="quantita" id="quantita" placeholder="quantita" required value="<?php echo htmlspecialchars($quantita)?>">
</div>