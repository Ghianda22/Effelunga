<?php
    include('../templates/head.php');
    require("../config.php");
    include("../modules/loginResponsabile.php");?>

</head>
<body>
    <h1><a href="../../index.php">Effelunga</a></h1>
<?php
session_start();
if(isset($_SESSION['cf'])){
    echo "Ciao ".$_SESSION['cf'];
?>
    <form method="POST"><input class="right" type="submit" name="exit" value="Esci"></form>
<?php
    if(isset($_POST['exit'])){
        session_destroy();
        header("Location: ../../index.php");
    }
} else {
    echo "Si sono verificati dei problemi";
    session_destroy();
    header("Location: ../../index.php");
}
?>

<form class="login" action="areaDipendenti.php" method="POST">
    <label> LOGIN RESPONSABILE: </label>
    <div>
        <input type="email" name="email" placeholder="Inserisci email aziendale" required>
        <p class="err"><?php echo $email_err ?></p>
        <input type="password" name="psw" placeholder="Inserisci password" required>
        <p class="err"><?php echo $pw_err ?></p>
        <input class="submit" type="submit" value="Conferma"><input class="reset" type="reset" value="Cancella">
    </div>
</form>

<!-- BOTTONE VISUALIZZA ORARIO PERSONALE -->

<?php include('../templates/footer.php'); ?>
