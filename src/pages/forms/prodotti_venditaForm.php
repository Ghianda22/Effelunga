<p>PRODOTTO NELLO SCAFFALE</p>
<div>
    <label>Inserisci il codice identificativo del supermercato</label>
    <input type="text" name="id_supermercato" placeholder="codice supermercato" required value="<?php echo htmlspecialchars($id_supermercato)?>">
    <p class="err"><?php echo $errors['id_supermercato']; ?></p>

    <label>Inserisci il nome del reparto</label>
    <input type="text" name="nome_reparto" placeholder="nome reparto" required value="<?php echo htmlspecialchars($nome_reparto)?>">
    <p class="err"><?php echo $errors['nome_reparto']; ?></p>

    <label>Inserisci il codice identificativo del prodotto</label>
    <input type="text" name="id_prodotto" placeholder="codice prodotto" required value="<?php echo htmlspecialchars($id_prodotto)?>">
    <p class="err"><?php echo $errors['id_prodotto']; ?></p>

    <label>Inserisci soglia_minima</label>
    <input type="numeric" min = "0" name="soglia minima" required value="<?php echo htmlspecialchars($soglia_minima);?>">
    <p class="err"><?php echo $errors['soglia_minima']; ?></p>

    <label>Inserisci il codice dello scaffale</label>
    <input type="text" name="scaffale" placeholder="scaffale" required value="<?php echo htmlspecialchars($scaffale)?>">
    <p class="err"><?php echo $errors['scaffale']; ?></p>


    <label>Inserisci quantità</label>
    <input type="numeric" min = 0 name="quantita" required value="<?php echo htmlspecialchars($quantita);?>">
    <p class="err"><?php echo $errors['quantita']; ?></p>

</div>
<p class="err"><?php echo $errors['double'] ?></p>