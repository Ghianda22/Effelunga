<?php
include "../modules/promozioniC.php";
include "../templates/head.php";
?>
    <title>Aggiungi catalogo promozionale - Effelunga </title>
    </head>
    <body>
<div class="container">
    <h1><a href="../../index.php">Effelunga</a></h1>
    <h1>AGGIUNGI CATALOGO PROMOZIONALE AL SUPERMERCATO</h1>
    <form action="./nuovoPromozioni.php" method="POST">

        <?php require "forms/promozioniForm.php"?>

        <div>
            <input type="submit" name="submit" id="submit" value="Adotta catalogo promozionale">
            <input type="reset" name="reset" id="reset" value="Cancella tutto">
        </div>
    </form>
</div>
<?php require "../templates/footer.php";?>