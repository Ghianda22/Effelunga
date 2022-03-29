<?php
include ("../templates/head.php");
include ("../modules/prodotti_venditaC.php");
?>
    <title>Nuovo prodotto in vendita</title>
</head>
<body>
    <h1><a href="../../index.php">Effelunga</a></h1>
    
    <div class="container">
    <h1>INSERISCI NUOVO PRODOTTO NELLO SCAFFALE:</h1>
    <form action="nuovoProdotti_vendita.php" method="post">
        
        <?php require "forms/prodotti_venditaForm.php"?>

        <input type="submit" name="submit" id="submit" value="Conferma">
        <input type="reset" name="reset" id="reset" value="Cancella tutto">
    </form>
    </div>
<?php include ("../templates/footer.php");
