<p>ORARIO:</p>
<div>
    <label for = "id_supermercato">Inserisci il codice identificativo del supermercato</label>
    <input type="text" name="id_supermercato" placeholder="Codice supermercato" required value="<?php echo htmlspecialchars($id_supermercato);?>">
    <p class="err"><?php echo $errors['id_supermercato'] ?></p>
</div>
<div>
    <label for="giorno">Giorno</label>
    <input type="text" name="giorno" placeholder="feriale/festivo" required value="<?php echo htmlspecialchars($giorno)?>">
    <p class="err"><?php echo $errors['giorno']; ?></p>
</div>
<div>
    <label for="apertura">Orario apertura supermercato</label>
    <input type="number" min = "0" max = "24" name="apertura" placeholder="apertura" required value="<?php echo htmlspecialchars($apertura)?>">
    <p class="err"><?php echo $errors['apertura']; ?></p>
    
    <label for="chiusura">Orario chiusura supermercato</label>
    <input type="number" min = "0" max = "24" name="chiusura" placeholder="chiusura" required value="<?php echo htmlspecialchars($chiusura)?>">
    <p class="err"><?php echo $errors['chiusura']; ?></p>
</div>
<p class="err"><?php echo $errors['double'] ?></p>


