<div>
    <input type="text" name="nome" placeholder="Nome" required value="<?php echo htmlspecialchars($nome)?>">
    <p class="err"> <?php echo $errors['nome']; ?> </p>
</div>
<div>
    <label for="data_inizio">Seleziona la data di inizio validità di questo calendario promozioni</label>
    <input type="date" name="data_inizio" required value="<?php echo htmlspecialchars($data_inizio)?>">
    <p class="err"> <?php echo $errors['data_inizio']; ?> </p>
    <label for="data_inizio">Seleziona la data di fine validità di questo calendario promozioni</label>
    <input type="date" name="data_fine" required value="<?php echo htmlspecialchars($data_fine)?>">
    <p class="err"> <?php echo $errors['data_fine']; ?> </p>
</div>
