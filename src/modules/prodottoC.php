<?php require (__DIR__."/../config.php");
//INIZIALIZZAZIONE VARIABILI: $nome = $punti = $prezzo = $nome_err = "";
$tab = 'prodotto';
$key = 'id_prodotto';

require (__DIR__."/controls_forms/col_names.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

    //VALIDAZIONE NOME
    $input_nome = trim($_POST["nome"]);
    if(empty($input_nome)){
        $errors['nome'] = "Inserisci un nome";
    } elseif  (!filter_var($input_nome, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9a-zA-ZÀ-ú\s]+$/")))) {
        $errors['nome'] = "Il nome può contenere solo lettere";
    } elseif (strlen($input_nome) > 100){
        $errors['nome'] = "Il nome inserito è troppo lungo";
    } else {
        $nome = strtolower($input_nome);
    }

    //VALIDAZIONE PUNTI (?)
    $input_punti = (int)$_POST["punti"];
    if($input_punti === 0) {
        $punti = $input_punti;
    } elseif(empty($input_punti)){ 
        $errors['punti'] = "Inserisci un valore per i punti";
    } elseif (!is_numeric($input_punti)) {
        $errors['punti'] = "Il campo punti essere composto di soli numeri";
    } else {
        $punti = $input_punti;
        //echo gettype($punti);
    }
 
    //VALIDAZIONE PREZZO (?)
    $input_prezzo_al_pubblico = trim($_POST["prezzo_al_pubblico"]);
    if(empty($input_prezzo_al_pubblico)){
        $errors['prezzo_al_pubblico'] = "Inserisci un valore per i prezzo";
    } elseif (!is_numeric($input_prezzo_al_pubblico)) {
        $errors['prezzo_al_pubblico'] = "Il campo prezzo essere composto di soli numeri";
    } else {
        //echo gettype($input_prezzo_al_pubblico);
        $prezzo_al_pubblico = (float)$input_prezzo_al_pubblico;
        //echo gettype($prezzo_al_pubblico);
    }

    //creo le righe, una con il nome della tabella, una con i valori
    $tab_val = "$tab ("; //nome tabella (
    foreach ($col_name as $col) { //per ogni colonna nella tabella
        if ($col == $key) {
            continue;
        }
        $tab_val.= $col.","; //aggiungo il nome della colonna e la virgola
        $params[] = $$col; //aggiunge la variabile ($) che si chiama con il nome della colonna ($col) ai parametri da inserire
    }
    $tab_val = substr($tab_val, 0, -1).")";

    if (strpos($_SERVER['REQUEST_URI'], 'nuovoProdotto') !== FALSE) {
        //controllo se il nome del prodotto è già presente nel DB
        $sql = "SELECT nome FROM prodotto WHERE  nome = '$nome'";
        $result = pg_query($conn, $sql);
        $row = pg_fetch_array($result);
        if ($row[0] === $nome){
            $errors['nome'] = "Questo prodotto è già stato inserito!";
        }
    }

    //inserimento nel db
    if(!array_filter($errors)){

        //aggiunge tanti $ quanti sono i valori da inserire nella query
        $values = "";
        for ($i = 1; $i <= count($params); $i++) {
            if ($i < count($params)) {
                $values .= "$" . $i . ",";
            } else {
                $values .= "$" . $i;
            }
        }

        //se l'url che fa la richiesta contiene nuovoProdotto -> creare un Prodotto-> query insert
        if (strpos($_SERVER['REQUEST_URI'], 'nuovoProdotto') !== FALSE) {

            $sql = "INSERT INTO $tab_val VALUES ($values)";
            $insert_query = pg_query_params($conn, $sql, $params);

            $header = "../../index.php";

            //se non c'è nuovoProdotto -> arrivo da modifyPHP
        } elseif ($_POST['submit'] === "Modifica") { //se ho cliccato sul pulsante modifica creo la query

            $id_prodotto = $_SESSION['key_val'];

            array_shift($col_name);
            
            $coupled_val = ""; //lista di coppie "chiave = valore"
            for ($i = 0; $i < count($params); $i++) { //per ogni valore crea chiave = $1/$2/$3...
                $coupled_val .= "$col_name[$i] = $" . ($i + 1) . ", ";
            }
            $coupled_val = substr($coupled_val, 0, -2);

            //da settare ogni volta
            $cond = "$key = '${$key}'";
            $sql = "UPDATE $tab SET $coupled_val WHERE $cond;";

            $insert_query = pg_query_params($conn, $sql, $params);

            $header = "../../../index.php";
        } else { //altrimenti do un valore standard per tornare indietro senza fare nulla
            $insert_query = true;
            $header = "../../../index.php";
        }
        //se la query va a buon fine, o se non faccio nulla, vado alla pagina originaria
        if ($insert_query) {
            header("Location: $header");
            exit();
        } else {
            exit("C'è stato un errore: " . pg_last_error($conn));
        }
    }

}

?>

