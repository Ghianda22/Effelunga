<html>
    <head>
        <title>Prova</title>
    </head>
    <body>
        <h1>Questa è una prova</h1>
        <?php
            require_once "config.php";

            $queryProva = "SELECT * FROM tessera_cliente";

            if($result = pg_query($conn,$queryProva)){
                if(pg_num_rows($result) > 0){
                    while($row = pg_fetch_array($result)){
                        echo $row[1];

                    }
                }
            }
        ?>
    </body>
</html>