<?php
    require_once "../modules/tessera_clienteC.php";
    require "../templates/head.php";
?>
        <title>Nuovo Cliente! - Effelunga</title>
    </head>
    <body>
        <div class="container">
            <h1><a href="../../index.php">Effelunga</a></h1>
            <h1>REGISTRA UN NUOVO CLIENTE</h1>
            <form action="nuovoCliente.php" method="POST">

                <?php require "forms/tessera_clienteForm.php";?>

                <div>
                    <input type="submit" name="submit" id="submit" value="Registrati!">
                    <input type="reset" name="reset" id="reset" value="Cancella tutto">
                </div>

            </form>
        </div>
    </body>
    
</html>