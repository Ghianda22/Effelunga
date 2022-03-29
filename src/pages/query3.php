<h1><a href="../../index.php">Effelunga</a></h1>
<?php
//valori iniziali per la query
/* fields = i campi che mi interessano
 * tab = la tabella da cui prendo
 * cond = la condizione che voglio applicare
 * order = l'attributo per cui voglio ordinare
 */

$tab = "prodotto p, composizione_prodotto i JOIN composizione_prodotto a ON i.assemblato = a.ingrediente";
$fields = "DISTINCT id_prodotto, nome, punti, prezzo_al_pubblico";
$cond = "a.assemblato = p.id_prodotto"; //valore base = primary key non è nulla
$order = "id_prodotto";

include "../modules/view_universal/tablePhp.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    include "../modules/view_universal/filterPhp.php";
}
include "../modules/view_universal/filterHtml.php";
include "../modules/view_universal/tableHtml.php";

?>