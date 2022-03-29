<div>
    <input type="text" name="id_catalogo" placeholder="ID Catalogo" required value="<?php echo htmlspecialchars($id_catalogo)?>">
    <p class="err"> <?php echo $errors['id_catalogo'];?> </p>
    <input type="text" name="id_prodotto" placeholder="ID prodotto" required value="<?php echo htmlspecialchars($id_prodotto)?>">
    <p class="err"> <?php echo $errors['id_prodotto'];?> </p>
    <p class="err"> <?php echo $errors['double'];?> </p>
</div>
<div>
    <input type="text" name="op_punti" placeholder="Operazione sui punti (es. x2, +5...)" value="<?php echo htmlspecialchars($op_punti)?>">
    <p class="err"> <?php echo $errors['op_punti']; ?> </p>
    <input type="text" name="op_prezzo" placeholder="Operazione sul prezzo (es. 20%...)" value="<?php echo htmlspecialchars($op_prezzo)?>">
    <p class="err"> <?php echo $errors['op_prezzo']; ?> </p>
</div>

