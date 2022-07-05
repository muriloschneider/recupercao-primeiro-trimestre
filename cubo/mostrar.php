<!DOCTYPE html>
<?php
    //include_once "../classe/forma.class.php";
    //require_once "../classe/databassed.class.php";
    include_once "../classe/cubo.class.php";
    $cor = isset($_GET['cor']) ? $_GET['cor'] : "";
    $id_cubo = isset($_GET['id_cubo']) ? $_GET['id_cubo'] : 0;
    $quadrado_id = isset($_GET['quadrado_id']) ? $_GET['quadrado_id'] : 0;

?>
<html lang="en">
<head>
     <style>
    /* div{
        background-color : <?php// echo $cor; ?>;
        width: <?php //echo $altura_retangulo ?>px;
        height: <?php //echo $base_retangulo ?>px;
    } */
    </style> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $cub = new cubo("1", $cor, $quadrado_id);
        echo $cub;
    echo $cub->desenha();
    ?>
    <div></div>
</body>
</html>
