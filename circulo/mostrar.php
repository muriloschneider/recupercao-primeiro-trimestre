<!DOCTYPE html>
<?php
    //include_once "../classe/forma.class.php";
    //require_once "../classe/databassed.class.php";
    include_once "../classe/circulo.class.php";
    $raio = isset($_GET['raio']) ? $_GET['raio']: 0;
    $cor = isset($_GET['cor']) ? $_GET['cor']: "";
    $idtabu = isset($_GET['idtabu']) ? $_GET['idtabu']: "";
?>
<html lang="en">
<head>
    <!-- <style>
    div{
        background-color : <?php //echo $cor; ?>;
        width: <?php //echo $lado ?>px;
        height: <?php //echo $lado ?>px;
    }
    </style> -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $circ = new circulo("1", $raio, $cor, $idtabu);
    echo $circ;
    echo $circ->desenha();
    ?>
    <div></div>
</body>
</html>
