<?php
    include("../templates/head.php");
    include("../modules/responsabileC.php");
?>
    <title>Nuovo Responsabile</title>
</head>
<body>
<h1><a href="../../index.php">Effelunga</a></h1>

    <div class="container">
    <form action="nuovoResponsabile.php" method="post">

        <?php require "forms/responsabileForm.php" ?>

        <div>
            <input type="submit" name="submit" id="submit" value="Conferma">
            <input type="reset" name="reset" id="reset" value="Cancella tutto">
        </div>
    </form>
    </div>
<?php include("../templates/footer.php");?>
