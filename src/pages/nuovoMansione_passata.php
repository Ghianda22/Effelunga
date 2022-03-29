<?php
include("../templates/head.php");
include("../modules/mansione_passataC.php");
?>
<title>Nuovo Mansione Passata</title>
</head>
<body>
    <h1><a href="../../index.php">Effelunga</a></h1>
    
    <div class="container">
    <h1>INSERISCI NUOVA MANSIONE PASSATA:</h1>
    <form action="./nuovoMansione_passata.php" method="post">
        
        <?php require "forms/mansione_passataForm.php"?>

        <div>
            <input type="submit" name="submit" id="submit" value="Conferma">
            <input type="reset" name="reset" id="reset" value="Cancella tutto">
        </div>
    </form>
    </div>

<?php include("../templates/footer.php");?>
