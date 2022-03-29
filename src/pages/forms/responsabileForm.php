<p>Inserisci i dati del nuovo responsabile</p>

<div>
    <label for = "id_supermercato">Inserisci il codice identificativo del supermercato</label>
    <input type="text" name="id_supermercato" placeholder="Codice supermercato" required value="<?php echo htmlspecialchars($id_supermercato);?>">
    <p class="err"><?php echo $errors['id_supermercato'] ?></p>

    <label for = "nome_reparto">Inserisci il nome del reparto</label>
    <input type="text" name="nome_reparto" placeholder="nome" required value="<?php echo htmlspecialchars($nome_reparto);?>">
    <p class="err"><?php echo $errors['nome_reparto'] ?></p>
</div>

<div>
    <label for="cf">Codice fiscale</label>
    <input type="text" name="cf" placeholder="Codice fiscale" required value="<?php echo htmlspecialchars($cf)?>">
    <p class="err"> <?php echo $errors['cf']; ?> </p>
</div>

<div>
    <label for = "email_aziendale">Inserisci l'email aziendale del responsabile</label>
    <input type="email" name="email_aziendale" placeholder="email" required value="<?php echo htmlspecialchars($email_aziendale);?>">
    <p class="err"><?php echo $errors['email_aziendale'] ?></p>

    <label for = "password">Inserisci la password</label>
    <input type="text" name="password" placeholder="password" required value="<?php echo htmlspecialchars($password);?>">
    <p class="err"><?php echo $errors['password'] ?></p>
</div>
<p class="err"><?php echo $errors['double'] ?></p>