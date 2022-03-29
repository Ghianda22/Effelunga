<?php
include("../templates/head.php");
include("../modules/turniC.php");
?>
<title>Nuovo Turno Dipendente</title>
</head>
<body>
    <h1><a href="../../index.php">Effelunga</a></h1>
    
    <div class="container">
    <h1>INSERISCI NUOVO TURNO:</h1>
    <form action="./nuovoTurni.php" method="post">
        
        <?php require "forms/turniForm.php"?>

        <div>
            <input type="submit" name="submit" id="submit" value="Conferma">
            <input type="reset" name="reset" id="reset" value="Cancella tutto">
        </div>
    </form>
    </div>

<?php include("../templates/footer.php");?>
