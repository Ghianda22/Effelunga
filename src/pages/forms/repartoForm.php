<p>REPARTO</p>
<div>
    <label>Inserisci il codice identificativo del supermercato</label>
    <input type="text" name="id_supermercato" placeholder="codice supermercato" required value="<?php echo htmlspecialchars($id_supermercato)?>">
    <p class="err"><?php echo $errors['id_supermercato']; ?></p>

    <label>Inserisci il nome del reparto</label>
    <input type="text" name="nome_reparto" placeholder="nome reparto" required value="<?php echo htmlspecialchars($nome_reparto);?>">
    <p class="err"><?php echo $errors['nome_reparto']; ?></p>
</div>
<p class="err"><?php echo $errors['double'] ?></p>