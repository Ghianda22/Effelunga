<?php
include ("../templates/head.php");
include ("../modules/prodottoC.php");
?>
    <title>Nuovo Prodotto</title>
</head>
<body>
    <h1><a href="../../index.php">Effelunga</a></h1>
    
    <div class = container>
        <h1>INSERISCI NUOVO PRODOTTO:</h1>    
        <form action="nuovoProdotto.php" method="POST">
            <?php require "forms/prodottoForm.php"?>

            <input type="submit" name="submit" id="submit" value="Conferma">
            <input type="reset" name="reset" id="reset" value="Cancella tutto">
        </form>
    </div>
<?php include ("../templates/footer.php");
