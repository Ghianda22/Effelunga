<?php
include "../modules/regali_ritiratiC.php";
include "../templates/head.php";
?>
<title>Nuovo ritiro regalo - Effelunga </title>
</head>
<body>
<div class="container">
    <h1><a href="../../index.php">Effelunga</a></h1>
    <h1>INSERISCI UN NUOVO RITIRO</h1>
    <form action="./nuovoRegali_ritirati.php" method="POST">

        <?php require "forms/regali_ritiratiForm.php"?>

        <div>
            <input type="submit" name="submit" id="submit" value="Inserisci ritiro">
            <input type="reset" name="reset" id="reset" value="Cancella tutto">
        </div>
    </form>
</div>
<?php require "../templates/footer.php";?>
