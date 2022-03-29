<p>Dati nuovo Store Effelunga:</p>

<div>
    <label for="nome">Nome</label>
    <input type="text" name="nome" placeholder="Nome" required value="<?php echo htmlspecialchars($nome)?>">
    <p class="err"> <?php echo $errors['nome']; ?> </p>
</div>

<p class="err"><?php echo $errors['double'] ?></p>