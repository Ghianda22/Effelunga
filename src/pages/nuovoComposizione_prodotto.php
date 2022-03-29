<?php
require_once "../modules/composizione_prodottoC.php";
require "../templates/head.php";
?>
<title>Nuovo ingrediente - Effelunga</title>
</head>
<body>
<div class="container">
    <h1><a href="../../index.php">Effelunga</a></h1>
    <h1>INSERISCI UN NUOVO INGREDIENTE PER UN PRODOTTO ASSEMBLATO</h1>
    <form action="./nuovoComposizione_prodotto.php" method="POST">

        <?php require "forms/composizione_prodottoForm.php";?>

        <div>
            <input type="submit" name="submit" id="submit" value="Inserisci ingrediente">
            <input type="reset" name="reset" id="reset" value="Cancella tutto">
        </div>

    </form>
</div>
</body>

</html>