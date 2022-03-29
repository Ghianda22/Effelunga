<?php
require_once "../modules/regaloC.php";
require "../templates/head.php";
?>
<title>Nuovo regalo - Effelunga</title>
</head>
<body>
<div class="container">
    <h1><a href="../../index.php">Effelunga</a></h1>
    <h1>CREA UN NUOVO REGALO</h1>
    <form action="./nuovoRegalo.php" method="POST">

        <?php require "forms/regaloForm.php";?>

        <div>
            <input type="submit" name="submit" id="submit" value="Inserisci">
            <input type="reset" name="reset" id="reset" value="Cancella tutto">
        </div>

    </form>
</div>
</body>

</html>