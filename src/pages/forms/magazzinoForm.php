<p>PRODOTTO IN MAGAZZINO</p>
<div>
    <label>Inserisci il codice identificativo del supermercato</label>
    <input type="text" name="id_supermercato" placeholder="codice supermercato" required value="<?php echo htmlspecialchars($id_supermercato)?>">
    <p class="err"><?php echo $errors['id_supermercato']; ?></p>

    <label>Inserisci il codice identificativo del prodotto</label>
    <input type="text" name="id_prodotto" placeholder="codice prodotto" required value="<?php echo htmlspecialchars($id_prodotto)?>">
    <p class="err"><?php echo $errors['id_prodotto']; ?></p>
   
    <label>Inserisci quantità</label>
    <input type="numeric" min = 0 name="quantita"required value="<?php echo htmlspecialchars($quantita);?>">
    <p class="err"><?php echo $errors['quantita']; ?></p>

    <label>Inserisci soglia_minima</label>
    <input type="numeric" min = "0" name="soglia_minima" required value="<?php echo htmlspecialchars($soglia_minima);?>">
    <p class="err"><?php echo $errors['soglia_minima']; ?></p>
</div>
<p class="err"><?php echo $errors['double'] ?></p>