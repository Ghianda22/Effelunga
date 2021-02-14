<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $tab = $_POST['tab'];
    $mode = $_POST['submit'];

    if ($mode === 'read') {
        $header = __DIR__."/src/modules/$tab"."R.php";
    } else {
        $header = __DIR__."/src/pages/$tab"."C.php";
    }

    header("Location: $header");
    exit();
}
?>
