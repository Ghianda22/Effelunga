<div>
    <input type="text" name="nome" placeholder="Nome" required value="<?php echo htmlspecialchars($nome)?>">
    <input type="text" name="cognome" placeholder="Cognome" required value="<?php echo htmlspecialchars($cognome)?>">
    <p class="err"> <?php echo $errors['nome']; ?> </p>
    <p class="err"> <?php echo $errors['cognome']; ?> </p>
    <label for="data_nascita">Seleziona la tua data di nascita</label>
    <input type="date" name="data_nascita" id="data_nascita" required value="<?php echo htmlspecialchars($data_nascita)?>">
</div>
<div>
    <input type="text" name="via" placeholder="Via" required value="<?php echo htmlspecialchars($via)?>">
    <input type="text" name="civico" placeholder="Civico" required value="<?php echo htmlspecialchars($civico)?>">
    <input type="number" name="cap" placeholder="CAP" required value="<?php echo htmlspecialchars($cap)?>">
    <input type="text" name="citta" placeholder="Citt&aacute;" required value="<?php echo htmlspecialchars($citta)?>">
    <p class="err"> <?php echo $errors['cap']; ?> </p>
</div>

<div>
    <input type="telefono" name="telefono" placeholder="Telefono" required value="<?php echo htmlspecialchars($telefono)?>">
    <p class="err"> <?php echo $errors['telefono']; ?> </p>
    <input type="email" name="email" placeholder="Email" required value="<?php echo htmlspecialchars($email)?>">
    <p class="err"> <?php echo $errors['email']; ?> </p>
</div>

<div>
    <label for="password">Scegli la password con cui potrai accedere alla tua area cliente</label>
    <input type="password" name="password" id="password" placeholder="Scegli una password" required>
    <p class="err"> <?php echo $errors['password']; ?> </p>
</div>
