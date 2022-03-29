<?php
include ("../templates/head.php");
include ("../modules/repartoC.php");
?>
    <title>Nuovo Reparto</title>
</head>
<body>
    <h1><a href="../../index.php">Effelunga</a></h1>
    
    <div class="container">
    <h1>INSERISCI NUOVO REPARTO:</h1>
    <form action="nuovoReparto.php" method="post">
        
        <?php require "forms/repartoForm.php"?>

        <input type="submit" name="submit" id="submit" value="Conferma">
        <input type="reset" name="reset" id="reset" value="Cancella tutto">
    </form>
    </div>
<?php include ("../templates/footer.php");
