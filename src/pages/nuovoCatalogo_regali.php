<?php
include "../modules/catalogo_regaliC.php";
include "../templates/head.php";
?>
    <title>Aggiungi regalo al catalogo - Effelunga </title>
    </head>
    <body>
<div class="container">
    <h1><a href="../../index.php">Effelunga</a></h1>
    <h1>AGGIUNGI REGALO AL CATALOGO</h1>
    <form action="./nuovoCatalogo_regali.php" method="POST">

        <?php require "forms/catalogo_regaliForm.php"?>

        <div>
            <input type="submit" name="submit" id="submit" value="Aggiungi regalo al catalogo">
            <input type="reset" name="reset" id="reset" value="Cancella tutto">
        </div>
    </form>
</div>
<?php require "../templates/footer.php";?>