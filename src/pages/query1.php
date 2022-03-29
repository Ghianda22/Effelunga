<h1><a href="../../index.php">Effelunga</a></h1>
<?php
//valori iniziali per la query
/* fields = i campi che mi interessano
 * tab = la tabella da cui prendo
 * cond = la condizione che voglio applicare
 * order = l'attributo per cui voglio ordinare
 */

$tab = "prodotti_venduti";
$fields = "*";
$cond = "nome_reparto = 'macelleria' AND id_scontrino IN (
SELECT id_scontrino
FROM scontrino
WHERE data = '12-05-2020'
)"; //valore base = primary key non è nulla
$order = "id_prodotto";

include "../modules/view_universal/tablePhp.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    include "../modules/view_universal/filterPhp.php";
}
include "../modules/view_universal/filterHtml.php";
include "../modules/view_universal/tableHtml.php";

?>