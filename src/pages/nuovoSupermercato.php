<?php
    include ("../templates/head.php");
    include ("../modules/supermercatoC.php");
?>
<title>Nuovo Supermercato</title>
</head>
<body>
<h1><a href="../../index.php">Effelunga</a></h1>

    <div class="container">
    <h1>INSERISCI NUOVO STORE:</h1>
    <form action="nuovoSupermercato.php" method="post">
    
        <?php require "forms/supermercatoForm.php"?>

        <div>
            <input type="submit" name="submit" id="submit" value="Conferma">
            <input type="reset" name="reset" id="reset" value="Cancella tutto">
        </div>
    </form>

<?php include ("../templates/footer.php");