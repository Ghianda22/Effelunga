<div>
    <label for="p_iva">Partita Iva</label>
    <input type="text" name="p_iva" placeholder="Partita Iva" maxlength="11" minlength="11"  required value="<?php echo htmlspecialchars($p_iva);?>">
    <p class="err"> <?php echo $errors['p_iva']; ?> </p>
    <label for="id_prodotto">ID Prodotto</label>
    <input type="text" name="id_prodotto" placeholder="ID prodotto" required value="<?php echo htmlspecialchars($id_prodotto);?>">
    <p class="err"> <?php echo $errors['id_prodotto'];?> </p>
    <p class="err"> <?php echo $errors['double'];?> </p>
</div>
<div>
    <label for="tempo_consegna">Tempo di consegna: </label>
    <input type="text" name="tempo_consegna" placeholder="N° giorni" required value="<?php echo htmlspecialchars($tempo_consegna);?>">
    <p class="err"> <?php echo $errors['tempo_consegna'];?> </p>
    <label for="prezzo_fornitore">Prezzo del fornitore: </label>
    <input type="number" step=".01" name="prezzo_fornitore" placeholder="Prezzo del fornitore" required value="<?php echo htmlspecialchars($prezzo_fornitore);?>">
    <p class="err"> <?php echo $errors['prezzo_fornitore'];?> </p>
    <label for="codice_esterno">Codice prodotto del fornitore: </label>
    <input type="text" name="codice_esterno" placeholder="Codice esterno" required value="<?php echo htmlspecialchars($codice_esterno);?>">
    <p class="err"> <?php echo $errors['codice_esterno'];?> </p>
</div>