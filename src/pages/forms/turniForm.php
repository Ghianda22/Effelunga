<P>DIPENDENTE:</P>
<div>
    <label for="cf">Codice fiscale</label>
    <input type="text" name="cf" placeholder="Cofice Fiscale" required value="<?php echo htmlspecialchars($cf)?>">
    <p class="err"><?php echo $errors['cf']; ?></p>
</div>
<div>
    <label for="giorno">Giorno</label>
    <input type="text" name="giorno" placeholder="Feriale/festivo" required value="<?php echo htmlspecialchars($giorno)?>">
    <p class="err"><?php echo $errors['giorno']; ?></p>
</div>
<div>
    <label for="inizio_turno">Orario inizio turno</label>
    <input type="number" min = "0" max = "24" name="inizio_turno" placeholder="inizio" required value="<?php echo htmlspecialchars($inizio_turno)?>">
    <p class="err"><?php echo $errors['inizio_turno']; ?></p>
    
    <label for="fine_turno">Orario fine turno</label>
    <input type="number" min = "0" max = "24" name="fine_turno" placeholder="fine" required value="<?php echo htmlspecialchars($fine_turno)?>">
    <p class="err"><?php echo $errors['fine_turno']; ?></p>
</div>
<p class="err"><?php echo $errors['double'] ?></p>