<?php
    //i nomi delle variabili devono essere uguali ai nomi delle colonne, per far funzionare il modify
    require (__DIR__."/../config.php");
    // metodo rapido che data una tabella fa una query per trovare il nome delle colonne
    // e inizializza le variabili con quel nome
    $tab = 'fornitore';
    $key = 'p_iva';

    require (__DIR__."/controls_forms/col_names.php");

    //$nome = $p_iva = $email = $rag_sociale = $telefono = $via = $cap = $civico = $citta = $mod_pagamento = "";
    //$errors = array('nome' => '', 'p_iva' => '', 'email' => '', 'rag_sociale' => '', 'telefono' => '', 'indirizzo' => '', 'mod_pagamento' => '');

    if($_SERVER["REQUEST_METHOD"] === "POST") {

        require (__DIR__."/controls_forms/email_tel.php");
        require (__DIR__."/controls_forms/address.php");

        //validazione nome
        $input_nome =  (trim($_POST["nome"]));
        if(empty($input_nome)){
            $errors['nome'] = "Inserisci un nome per il fornitore";

        }else{
            $nome = $input_nome;
        }

        //validazione p_iva
        $input_p_iva =  (trim($_POST["p_iva"]));
        if(empty($input_p_iva)){
            $errors['p_iva'] = "Inserisci la partita iva del fornitore";
        }elseif (!filter_var($input_p_iva, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9a-zA-ZÀ-ú\s]+$/")))){
            $errors['p_iva'] = "Inserisci una partita iva corretta";
        }else{
            $p_iva = $input_p_iva;
        }
        //validazione rag_sociale
        $input_rag_sociale =  (trim($_POST["rag_sociale"]));
        if(empty($input_rag_sociale)){
            $errors['rag_sociale'] = "Inserisci la ragione sociale";
        }else{
            $rag_sociale = $input_rag_sociale;
        }

        //validazione pagamento
        $input_pagamento =  (trim($_POST["mod_pagamento"]));
        if(empty($input_pagamento)){
            $errors['mod_pagamento'] = "Inserisci il metodo di pagamento";
        }else{
            $mod_pagamento = $input_pagamento;
        }

        //creo le righe, una con il nome della tabella, una con i valori
        $tab_val = "$tab ("; //nome tabella (
        foreach ($col_name as $col) { //per ogni colonna nella tabella
            $tab_val.= $col.","; //aggiungo il nome della colonna e la virgola
            $params[] = $$col; //aggiunge la variabile ($) che si chiama con il nome della colonna ($col) ai parametri da inserire
        }
        $tab_val = substr($tab_val, 0, -1).")";
        //$tab = "fornitore (p_iva, nome, rag_sociale, mod_pagamento, telefono, email, via, cap, citta, civico)";
        //$params = array($p_iva, $nome, $rag_sociale, $mod_pagamento, $telefono, $email, $via, $cap, $citta, $civico);

        //query di controllo, se ci sono altri con la stessa chiave, o con altri parametri
        $cond = "$key = '${$key}'";
        if (str_contains($_SERVER['REQUEST_URI'], 'nuovoFornitore')){
            $sql_check = "SELECT $key FROM $tab WHERE $cond;";
            $insert_check = pg_query_params($conn, $sql_check, array());
            if(pg_num_rows($insert_check) != 0) {
                $errors['double'] = "Esiste già un fornitore con questa partita iva";
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

                //se l'url che fa la richiesta contiene nuovoFornitore -> creare un fornitore -> query insert
                if (str_contains($_SERVER['REQUEST_URI'], 'nuovoFornitore')) {

                    $sql = "INSERT INTO $tab_val VALUES ($values)";
                    $insert_query = pg_query_params($conn, $sql, $params);

                    $header = "../../index.php";

                    //se non c'è nuovoFornitore -> arrivo da modifyPHP
                } elseif ($_POST['submit'] === "Modifica") { //se ho cliccato sul pulsante modifica creo la query

                    $coupled_val = ""; //lista di coppie "chiave = valore"
                    for ($i = 0; $i < count($params); $i++) { //per ogni valore crea chiave = $1/$2/$3...
                        $coupled_val .= "$col_name[$i] = $" . ($i + 1) . ", ";
                    }
                    $coupled_val = substr($coupled_val, 0, -2);
                    //da settare ogni volta
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