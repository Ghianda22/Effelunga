<?php
    include("../templates/head.php");
    include("../modules/dipendenteC.php");
?>
    <title>Nuovo Dipendente</title>
</head>
<body>
<h1><a href="../../index.php">Effelunga</a></h1>

    <div class="container">
    <form action="nuovoDipendente.php" method="post">

        <?php require "forms/dipendenteForm.php" ?>

        <div>
            <input type="submit" name="submit" id="submit" value="Conferma">
            <input type="reset" name="reset" id="reset" value="Cancella tutto">
        </div>
    </form>
    </div>
<?php include("../templates/footer.php");?>
