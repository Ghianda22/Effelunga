<h1><a href="../../index.php">Effelunga</a></h1>
<?php
//valori iniziali per la query
/* fields = i campi che mi interessano
 * tab = la tabella da cui prendo
 * cond = la condizione che voglio applicare
 * order = l'attributo per cui voglio ordinare
 */

$tab = "magazzino m, fornitura f";
$fields = "*";
$cond = " m.id_prodotto = f.id_prodotto AND m.soglia_minima < m.quantita AND m.id_prodotto IN (
SELECT id_prodotto
FROM prodotti_vendita
WHERE nome_reparto = 'cancelleria'
)"; //valore base = primary key non è nulla
$order = "tempo_consegna";

include "../modules/view_universal/tablePhp.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    include "../modules/view_universal/filterPhp.php";
}
include "../modules/view_universal/filterHtml.php";
include "../modules/view_universal/tableHtml.php";

?>