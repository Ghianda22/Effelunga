<?php
include "../modules/catalogoC.php";
include "../templates/head.php";
?>
    <title>Nuovo catalogo - Effelunga </title>
    </head>
    <body>
<div class="container">
    <h1><a href="../../index.php">Effelunga</a></h1>
    <h1>CREA UN NUOVO CATALOGO</h1>
    <form action="./nuovoCatalogo.php" method="POST">

        <?php require "forms/catalogoForm.php"?>

        <div>
            <input type="submit" name="submit" id="submit" value="Inserisci catalogo">
            <input type="reset" name="reset" id="reset" value="Cancella tutto">
        </div>
    </form>
</div>
<?php require "../templates/footer.php";?>