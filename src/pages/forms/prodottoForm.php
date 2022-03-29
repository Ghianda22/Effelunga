<p>PRODOTTO</p>
<div>
    <label>Inserisci il nome del prodotto</label>
    <input type="text" name="nome" placeholder="nome" required value="<?php echo htmlspecialchars($nome)?>">
    <p class="err"><?php echo $errors['nome']; ?></p>

    <label>Inserisci i punti</label>
    <input type="number" name="punti" placeholder="punti" required value="<?php echo htmlspecialchars($punti)?>">
    <p class="err"><?php echo $errors['punti']; ?></p>
   
    <label>Inserisci prezzo al pubblico</label>
    <input type="number" min="0.01" step="any" name="prezzo_al_pubblico" required value="<?php echo htmlspecialchars($prezzo_al_pubblico)?>">
    <p class="err"><?php echo $errors['prezzo_al_pubblico']; ?></p>
   
</div>