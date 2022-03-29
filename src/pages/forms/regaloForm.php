<div>
    <input type="text" name="nome" placeholder="Nome" required value="<?php echo htmlspecialchars($nome)?>">
    <p class="err"> <?php echo $errors['nome']; ?> </p>
</div>
<div>
    <input type="number" name="punti" min="1" required placeholder="Punti necessari" value="<?php echo htmlspecialchars($punti)?>">
    <p class="err"> <?php echo $errors['punti']; ?> </p>
    <input type="number" name="disponibilita" min="1" required placeholder="Quantità disponibile" value="<?php echo htmlspecialchars($disponibilita)?>">
    <p class="err"> <?php echo $errors['disponibilita']; ?> </p>
</div>
<div>
    <textarea name="descrizione" cols="100" rows="5" maxlength="600" placeholder="Descrizione del premio"><?php echo htmlspecialchars($descrizione)?></textarea>
</div>
