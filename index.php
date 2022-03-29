<?php include('src/templates/head.php'); ?>
<?php include('src/modules/loginDipendente.php'); ?>
    <title>HomePage - Effelunga</title>
</head>
<body>
    <div class="container mb-5">
        <h1>Effelunga</h1>
        <form class="login" action="index.php" method="POST">
            <p class="text-uppercase mb-0">LOGIN DIPENDENTI:</p>
            <div class="m-1">
                <input type="text" name="cf" placeholder="Inserisci Codice fiscale" required>
                <p class="err"><?php echo $cf_err; ?></p>
            </div>
            <input class="submit" type="submit" value="Conferma">
            <input class="reset" type="reset" value="Cancella">
        </form>
    </div>

    <div class = "container mb-5 list-group">
        <p class="text-uppercase mb-0">Gestione dipendenti:</p>
        <div class="list-group-item m-1">
            <a href="src/pages/nuovoDipendente.php" class="button">Inserisci nuovo dipendente</a>
            <a href="src/modules/dipendenteR.php" class="button">Visualizza i dipendenti</a>
        </div>
        <div class="list-group-item m-1">
            <a href="src/pages/nuovoResponsabile.php" class="button">Inserisci nuovo responsabile</a>
            <a href="src/modules/responsabileR.php" class="button">Visualizza i responsabili</a>
        </div>
        <div class="list-group-item m-1">
            <a href="src/pages/nuovoMansione_attuale.php" class="button">Inserisci mansione attuale</a>
            <a href="src/modules/mansione_attualeR.php" class="button">Visualizza le mansioni attuali</a>
        </div>
        <div class="list-group-item m-1">
            <a href="src/pages/nuovoMansione_passata.php" class="button">Inserisci mansione passata</a>
            <a href="src/modules/mansione_passataR.php" class="button">Visualizza le mansioni passate</a>
        </div>
    </div>

    <div class = "container mb-5 list-group">
        <p class="text-uppercase mb-0">Gestione turni:</p>
        <div class="list-group-item m-1">
            <a href="src/pages/nuovoTurni.php" class="button">Inserisci nuovo turno</a>
            <a href="src/modules/turniR.php" class="button">Visualizza i turni</a>
        </div>
    </div>

    <div class = "container mb-5 list-group">
        <p class="text-uppercase mb-0">Gestione supermercati:</p>
        <div class="list-group-item m-1">
            <a href="src/pages/nuovoSupermercato.php" class="button">Inserisci nuovo Supermercato</a>
            <a href="src/modules/supermercatoR.php" class="button">Visualizza Supermercati</a>
        </div>
        <div class="list-group-item m-1">
            <a href="src/pages/nuovoReparto.php" class="button">Inserisci nuovo Reparto</a>
            <a href="src/modules/repartoR.php" class="button">Visualizza Reparti</a>
        </div>
        <div class="list-group-item m-1">
            <a href="src/pages/nuovoOrario.php" class="button">Inserisci orari Store</a>
            <a href="src/modules/orarioR.php" class="button">Visualizza orari Store</a>
        </div>
    </div>

    <div class = "container mb-5 list-group">
        <p class="text-uppercase mb-0">Gestione fornitori:</p>
        <div class="list-group-item m-1">
            <a href="src/pages/nuovoFornitore.php" class="button">Inserisci nuovo fornitore</a>
            <a href="src/modules/fornitoreR.php" class="button">Visualizza i fornitori</a>
        </div>
        <div class="list-group-item m-1">
            <a href="src/pages/nuovoFornitura.php" class="button">Inserisci nuova fornitura</a>
            <a href="src/modules/fornituraR.php" class="button">Visualizza i dettagli delle forniture</a>
        </div>
    </div>

    <div class = "container mb-5 list-group">
        <p class="text-uppercase mb-0">Gestione prodotti:</p>
        <div class="list-group-item m-1">
            <a href="src/pages/nuovoProdotto.php" class="button">Inserisci un nuovo prodotto</a>
            <a href="src/modules/prodottoR.php" class="button">Visualizza i prodotti</a>
        </div>
        <div class="list-group-item m-1">
            <a href="src/pages/nuovoComposizione_prodotto.php" class="button">Inserisci un nuovo prodotto composto</a>
            <a href="src/modules/composizione_prodottoR.php" class="button">Visualizza i prodotti composti</a>
        </div>
        <div class="list-group-item m-1">
            <a href="src/pages/nuovoCatalogo_offerte.php" class="button">Inserisci un nuovo prodotto in offerta</a>
            <a href="src/modules/catalogo_offerteR.php" class="button">Visualizza tutti i prodotti in offerta nei vari cataloghi</a>
        </div>
    </div>

    <div class = "container mb-5 list-group">
        <p class="text-uppercase mb-0">Gestione vendite:</p>
        <div class="list-group-item m-1">
            <a href="src/modules/scontrinoR.php" class="button">Visualizza scontrini</a>
        </div>
        <div class="list-group-item m-1">
            <a href="src/modules/prodotti_vendutiR.php" class="button">Visualizza i prodotti venduti</a>
        </div>
    </div>

    <div class = "container mb-5 list-group">
        <p class="text-uppercase mb-0">Gestione magazzino:</p>
        <div class="list-group-item m-1">
            <a href="src/pages/nuovoMagazzino.php" class="button">Inserisci un prodotto in magazzino</a>
            <a href="src/modules/magazzinoR.php" class="button">Visualizza i prodotti in magazzino</a>
        </div>
        <div class="list-group-item m-1">
            <a href="src/pages/nuovoProdotti_vendita.php" class="button">Inserisci un prodotto nello scaffale</a>
            <a href="src/modules/prodotti_venditaR.php" class="button">Visualizza i prodotti sugli scaffali</a>
        </div>
    </div>

    <div class = "container mb-5 list-group">
        <p class="text-uppercase mb-0">Gestione regali e cataloghi:</p>
        <div class="list-group-item m-1">
            <a href="src/pages/nuovoCatalogo.php" class="button">Inserisci un nuovo catalogo</a>
            <a href="src/modules/catalogoR.php" class="button">Visualizza tutti i cataloghi</a>
        </div>
        <div class="list-group-item m-1">
            <a href="src/pages/nuovoPromozioni.php" class="button">Inserisci un nuovo catalogo promozionale in un supermercato</a>
            <a href="src/modules/promozioniR.php" class="button">Visualizza tutti i cataloghi promozionali attivi nei supermercati</a>
        </div>
        <div class="list-group-item m-1">
            <a href="src/pages/nuovoCatalogo_regali.php" class="button">Inserisci un regalo nel catalogo</a>
            <a href="src/modules/catalogo_regaliR.php" class="button">Visualizza i regali presenti nei cataloghi</a>
        </div>
        <div class="list-group-item m-1">
            <a href="src/pages/nuovoRegalo.php" class="button">Inserisci i dettagli di un nuovo regalo</a>
            <a href="src/modules/regaloR.php" class="button">Visualizza tutti i regali registrati</a>
        </div>
    </div>

    <div class = "container mb-5 list-group">
        <p class="text-uppercase mb-0">Gestione clienti:</p>
        <div class="list-group-item m-1">
            <a href="src/pages/nuovoCliente.php" class="button">Inserisci nuovo cliente</a>
            <a href="src/modules/tessera_clienteR.php" class="button">Visualizza i clienti</a>
        </div>
        <div class="list-group-item m-1">
            <a href="src/pages/nuovoRegali_ritirati.php" class="button">Inserisci nuovo ritiro del regalo</a>
            <a href="src/modules/regali_ritiratiR.php" class="button">Visualizza i regali ritirati</a>
        </div>
    </div>


    <div class = "container mt-2 mb-5">
        <p class="text-uppercase mb-0">Altre informazioni:</p>
        <div class="m-1">
            <ul class="list-group">
                <li class="list-group-item m-1"><a href="src/pages/query1.php" class="button">Vendite reparto macelleria il 12 maggio 2020</a></li>
                <li class="list-group-item m-1"><a href="src/pages/query2.php" class="button">Tempo minimo di riapprovigionamento per i prodotti di cancelleria da riassortire</a></li>
                <li class="list-group-item m-1"><a href="src/pages/query3.php" class="button">Prodotti composti da altri prodotti comopsti</a></li>
                <li class="list-group-item m-1"><a href="src/pages/esame_pagina.php" class="button">Obiettivi del mese per uno junior</a></li>
            </ul>
        </div>
    </div>

<?php include('src/templates/footer.php'); ?>
