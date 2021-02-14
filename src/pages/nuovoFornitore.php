<?php
include "../modules/fornitoreC.php";
include "../templates/head.php";
?>
    <title>Nuovo fornitore - Effelunga </title>
</head>
<body>
    <div class="container">
    <h1>INSERISCI UN NUOVO FORNITORE</h1>
    <form action="./nuovoFornitore.php" method="POST">

        <?php require "forms/fornitoreForm.php"?>

        <div>
            <input type="submit" name="submit" id="submit" value="Inserisci nuovo fornitore!">
            <input type="reset" name="reset" id="reset" value="Cancella tutto">
        </div>
    </form>
</div>
<?php require "../templates/footer.php";?>