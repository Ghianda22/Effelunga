<?php
    include ("../templates/head.php");
    include ("../modules/orarioC.php");
?>
    <title>Nuovo orario</title>
</head>
<body>
    <h1><a href="../../index.php">Effelunga</a></h1>

    <div class="container">
    <h1>Inserisci orari dello Store:</h1>
    <form action="nuovoOrario.php" method="post">

        <?php require "forms/orarioForm.php" ?>

        <div>
            <input type="submit" name="submit" id="submit" value="Conferma">
            <input type="reset" name="reset" id="reset" value="Cancella tutto">
        </div>
    </form>
    </div>

<?php include ("../templates/footer.php") ?>