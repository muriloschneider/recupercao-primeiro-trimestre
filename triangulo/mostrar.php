<!DOCTYPE html>
<?php
    //include_once "../classe/forma.class.php";
    //require_once "../classe/databassed.class.php";
    include_once "../classe/triangulo.class.php";
    $base_triangulo = isset($_GET['base_triangulo']) ? $_GET['base_triangulo'] : 0;
    $cor = isset($_GET['cor']) ? $_GET['cor'] : "";
    $id_triangulo = isset($_GET['id_triangulo']) ? $_GET['id_triangulo'] : 0;
    $ladoum = isset($_GET['ladoum']) ? $_GET['ladoum'] : 0;
    $ladodois = isset($_GET['ladodois']) ? $_GET['ladodois'] : 0;
    $idtabu = isset($_GET['idtabu']) ? $_GET['idtabu'] : 0;

?>
<html lang="en">
<head>
     <style>
    /* div{
        background-color : <?php //echo $cor; ?>;
        width: <?php //echo $ladoum ?>px;
        height: <?php// echo $ladodois ?>px;
    } */
    </style> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $tri = new triangulo("0", $ladoum, $ladodois, $cor, $idtabu, $base_triangulo);

        echo $tri;
    echo $tri->desenha();
    ?>
    <div></div>
</body>
</html>
