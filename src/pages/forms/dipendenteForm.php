<p>Inserisci i dati del nuovo dipendente</p>

<div>
    <input type="text" name="cf" placeholder="Codice fiscale" required value="<?php echo htmlspecialchars($cf)?>">
    <p class="err"> <?php echo $errors['cf']; ?> </p>
    <input type="text" name="nome" placeholder="Nome" required value="<?php echo htmlspecialchars($nome)?>">
    <p class="err"> <?php echo $errors['nome']; ?> </p>
    <input type="text" name="cognome" placeholder="Cognome" required value="<?php echo htmlspecialchars($cognome)?>">
    <p class="err"> <?php echo $errors['cognome']; ?> </p>
</div>
<div>
    <input type="tel" name="telefono" placeholder="Telefono" required value="<?php echo htmlspecialchars($telefono)?>">
    <p class="err"> <?php echo $errors['telefono']; ?> </p>
    <input type="email" name="email" placeholder="Email" required value="<?php echo htmlspecialchars($email)?>">
    <p class="err"> <?php echo $errors['email']; ?> </p>
    <p>Data di nascita:
        <input type="date" name="data_nascita" required  value="<?php echo htmlspecialchars($data_nascita)?>"></p>
</div>
<div>
    <p>Indirizzo:</p>
    <input type="text" name="via" placeholder="Via" required value="<?php echo htmlspecialchars($via)?>">
    <input type="text" name="civico" placeholder="Civico" required value="<?php echo htmlspecialchars($civico)?>">
    <input type="number" name="cap" placeholder="CAP" min="0" required value="<?php echo htmlspecialchars($cap)?>">
    <input type="text" name="citta" placeholder="Citt&aacute;" required value="<?php echo htmlspecialchars($citta)?>">
    <p class="err"> <?php echo $errors['cap']; ?> </p>
</div>
<div>
    <p>Data assunzione:
        <input type="date" name="data_assunzione" placeholder="Data assunzione" required value="<?php echo htmlspecialchars($data_assunzione)?>"></p>
    <input type="number" min="50" name="stipendio" placeholder="Stipendio" required  value="<?php echo htmlspecialchars($stipendio)?>">
</div>

<p class = "err"><?php echo $errors['double'] ?></p>
