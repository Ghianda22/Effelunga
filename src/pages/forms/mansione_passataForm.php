<p>Inserisci i dati della mansione passata</p>

<div>
    <label for = "id_supermercato">Inserisci il codice identificativo del supermercato</label>
    <input type="text" name="id_supermercato" placeholder="Codice supermercato" required value="<?php echo htmlspecialchars($id_supermercato);?>">
    <p class="err"><?php echo $errors['id_supermercato'] ?></p>

    <label for = "nome_reparto">Inserisci il nome del reparto</label>
    <input type="text" name="nome_reparto" placeholder="nome" required value="<?php echo htmlspecialchars($nome_reparto);?>">
    <p class="err"><?php echo $errors['nome_reparto'] ?></p>

    <label for="cf">Codice fiscale</label>
    <input type="text" name="cf" placeholder="Codice fiscale" required value="<?php echo htmlspecialchars($cf)?>">
    <p class="err"> <?php echo $errors['cf']; ?> </p>
</div>

<div>
    <label for = "nome_mansione">Inserisci la mansione del dipendente</label>
    <input type="text" name="nome_mansione" placeholder="mansione" required value="<?php echo htmlspecialchars($nome_mansione);?>">
    <p class="err"><?php echo $errors['nome_mansione'] ?></p>

    <label for = "descrizione">Inserisci una descrizione</label>
    <input type="text" name="descrizione" placeholder="descrizione" required value="<?php echo htmlspecialchars($descrizione);?>">
    <p class="err"><?php echo $errors['descrizione'] ?></p>

</div>
<div>
    <label for = "data_inizio">Inserisci la data di inizio</label>
    <input type="date" name="data_inizio" required value="<?php echo htmlspecialchars($data_inizio);?>">
    <p class="err"><?php echo $errors['data_inizio'] ?></p>
    
    <label for = "data_fine">Inserisci la data di fine</label>
    <input type="date" name="data_fine" required value="<?php echo htmlspecialchars($data_fine);?>">
    <p class="err"><?php echo $errors['data_fine'] ?></p>
</div>
<div>
    <label for ="responsabile">Era un responsabile? </label>
    <input type = "boolean" name="responsabile" placeholder="si/no" required value="<?php echo htmlspecialchars($responsabile);?>">
    <p class="err"><?php echo $errors['responsabile']?></p>
</div>


<p class="err"><?php echo $errors['double'] ?></p>