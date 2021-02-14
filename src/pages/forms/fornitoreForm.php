<div><p>FORNITORE: </p></div>
<div>
    <label for="nome">Nome</label>
    <input type="text" name="nome" placeholder="Nome" required value="<?php echo htmlspecialchars($nome)?>">
    <p class="err"> <?php echo $errors['nome']; ?> </p>
    <label for="rag_sociale">Rag. Sociale</label>
    <input type="text" name="rag_sociale" placeholder="Rag. sociale" maxlength="10" required value="<?php echo htmlspecialchars($rag_sociale)?>">
    <p class="err"> <?php echo $errors['rag_sociale']; ?> </p>
    <label for="p_iva">Partita Iva</label>
    <input type="text" name="p_iva" placeholder="Partita Iva" maxlength="11" minlength="11"  required value="<?php echo htmlspecialchars($p_iva)?>">
    <p class="err"> <?php echo $errors['p_iva']; ?> </p>
</div>
<div>
    <label for="mod_pagamento">Modalità di pagamento</label>
    <input type="text" name="mod_pagamento" placeholder="Modalità di pagamento" required value="<?php echo htmlspecialchars($mod_pagamento)?>">
    <p class="err"> <?php echo $errors['mod_pagamento']; ?> </p>
</div>

<div>
    <label for="telefono">Telefono:</label>
    <input type="tel" maxlength="10" name="telefono" placeholder="Telefono" required value="<?php echo htmlspecialchars($telefono)?>">
    <p class="err"> <?php echo $errors['telefono']; ?> </p>
    <label for="email">Email</label>
    <input type="email" name="email" size="40" placeholder="Email" required value="<?php echo htmlspecialchars($email)?>">
    <p class="err"> <?php echo $errors['email']; ?> </p>
</div>

<div>
    <p>Indirizzo:</p>
    <input type="text" name="via" placeholder="Via" required value="<?php echo htmlspecialchars($via)?>">
    <input type="text" name="civico" placeholder="Civico" required value="<?php echo htmlspecialchars($civico)?>">
    <input type="number" name="cap" placeholder="CAP" min="0" required value="<?php echo htmlspecialchars($cap)?>">
    <input type="text" name="citta" placeholder="Citt&aacute;" required value="<?php echo htmlspecialchars($citta)?>">
    <p class="err"> <?php echo $errors['cap']; ?> </p>
</div>
<p class="err"><?php echo $errors['double'] ?></p>
