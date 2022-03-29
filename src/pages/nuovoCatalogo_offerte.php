<?php
include "../modules/catalogo_offerteC.php";
include "../templates/head.php";
?>
    <title>Aggiungi prodotto in offerta - Effelunga </title>
    </head>
    <body>
<div class="container">
    <h1><a href="../../index.php">Effelunga</a></h1>
    <h1>INSERISCI UNA NUOVA OFFERTA NEL CATALOGO</h1>
    <form action="./nuovoCatalogo_offerte.php" method="POST">

        <?php require "forms/catalogo_offerteForm.php"?>

        <div>
            <input type="submit" name="submit" id="submit" value="Inserisci offerta">
            <input type="reset" name="reset" id="reset" value="Cancella tutto">
        </div>
    </form>
</div>
<?php require "../templates/footer.php";?><?php
