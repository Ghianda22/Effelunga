<?php
include "../modules/fornituraC.php";
include "../templates/head.php";
?>
    <title>Nuova fornitura - Effelunga </title>
    </head>
    <body>
<div class="container">
    <h1><a href="../../index.php">Effelunga</a></h1>
    <h1>INSERISCI UNA NUOVA FORNITURA</h1>
    <form action="./nuovoFornitura.php" method="POST">

        <?php require "forms/fornituraForm.php"?>

        <div>
            <input type="submit" name="submit" id="submit" value="Inserisci nuova fornitura">
            <input type="reset" name="reset" id="reset" value="Cancella tutto">
        </div>
    </form>
</div>
<?php require "../templates/footer.php";?>