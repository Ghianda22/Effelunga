<?php
include ("../templates/head.php");
include ("../modules/magazzinoC.php");
?>
    <title>Nuovo Magazzino</title>
</head>
<body>
    <h1><a href="../../index.php">Effelunga</a></h1>
    
    <div class="container">
    <h1>INSERISCI NUOVO PRODOTTO IN MAGAZZINO:</h1>
    <form action="nuovoMagazzino.php" method="post">
        
        <?php require "forms/magazzinoForm.php"?>

        <input type="submit" name="submit" id="submit" value="Conferma">
        <input type="reset" name="reset" id="reset" value="Cancella tutto">
    </form>
    </div>
<?php include ("../templates/footer.php");
