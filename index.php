<?php include('src/templates/head.php'); ?>
<?php include('src/modules/loginDipendente.php'); ?>
    <title>HomePage - Effelunga</title>
</head>
<body>

<h1>Effelunga</h1>

    <div class="container">
    <form class="login" action="index.php" method="POST">
        <label>LOGIN DIPENDENTI:</label>
        <div>
            <input type="text" name="cf" placeholder="Inserisci Codice fiscale" required>
            <p class="err"><?php echo $cf_err; ?></p>
        </div>
        <input class="submit" type="submit" value="Conferma">
        <input class="reset" type="reset" value="Cancella">
    </form>
    </div>

    <div class = "container">
        <label>Gestione dipendenti:</label>
        <div>
            <a href="src/pages/nuovoDipendente.php" class="button">Inserisci nuovo dipendente</a>
            <a href="src/modules/dipendenteR.php" class="button">Visualizza i dipendenti</a>
        </div>
        <div>    
            <a href="src/pages/nuovoResponsabile.php" class="button">Inserisci nuovo responsabile</a>
            <a href="src/modules/responsabileR.php" class="button">Visualizza i responsabili</a>
        </div>
    </div>

    <div class = "container">
        <label>Gestione turni:</label>
        <div>
            <a href="src/pages/nuovoTurni.php" class="button">Inserisci nuovo turno</a>
            <a href="src/modules/turniR.php" class="button">Visualizza i turni</a>
        </div>
    </div>

    <div class = "container">
        <label>Gestione supermercati:</label>
        <div>
            <a href="src/pages/nuovoSupermercato.php" class="button">Inserisci nuovo Supermercato</a>
            <a href="src/modules/supermercatoR.php" class="button">Visualizza Supermercati</a>
        </div>
        <div>     
            <a href="src/pages/nuovoReparto.php" class="button">Inserisci nuovo Reparto</a>
            <a href="src/modules/repartoR.php" class="button">Visualizza Reparti</a>
        </div>
        <div>
            <a href="src/pages/nuovoOrario.php" class="button">Inserisci orari Store</a>
            <a href="src/modules/orarioR.php" class="button">Visualizza orari Store</a>
        </div>
    </div>

    <div class = "container">
        <label>Gestione fornitori:</label>
        <div>
            <a href="src/pages/nuovoFornitore.php" class="button">Inserisci nuovo Fornitore</a>
            <a href="src/modules/fornitoreR.php" class="button">Visualizza i Fornitore</a>
        </div>
    </div>

    <div class = "container">
        <label>Gestione prodotti:</label>
        <div>
            <a href="src/pages/nuovoProdotto.php" class="button">Inserisci un nuovo prodotto</a>
            <a href="src/modules/prodottoR.php" class="button">Visualizza i prodotti</a>
        </div>
       
    </div>

    <div class = "container">
        <label>Gestione magazzino:</label>
        <div>
            <a href="src/pages/nuovoMagazzino.php" class="button">Inserisci un prodotto in magazzino</a>
            <a href="src/modules/magazzinoR.php" class="button">Visualizza i prodotti in magazzino</a>
        </div>
        <div>    
            <a href="src/pages/nuovoProdotti_vendita.php" class="button">Inserisci un prodotto nello scaffale</a>
            <a href="src/modules/prodotti_venditaR.php" class="button">Visualizza i prodotti sugli scaffali</a>
        </div>
    </div>

    <div class = "container">
    <label>Gestione cataloghi:</label>
    <div>
        <a href="src/pages/nuovoCatalogo.php" class="button">Inserisci un nuovo catalogo</a>
        <a href="src/modules/catalogoR.php" class="button">Visualizza tutti i cataloghi</a>
    </div>
    <div>
        <a href="src/pages/nuovoCatalogo_regali.php" class="button">Inserisci un regalo nel catalogo</a>
        <a href="src/modules/catalogo_regaliR.php" class="button">Visualizza i regali presenti nei cataloghi</a>
    </div><div>
        <a href="src/pages/nuovoRegalo.php" class="button">Inserisci i dettagli di un nuovo regalo</a>
        <a href="src/modules/regaloR.php" class="button">Visualizza tutti i regali registrati</a>
    </div>
</div>

<?php include('src/templates/footer.php'); ?>
