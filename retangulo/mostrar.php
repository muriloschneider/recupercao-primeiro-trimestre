<!DOCTYPE html>
<?php
    //include_once "../classe/forma.class.php";
    //require_once "../classe/databassed.class.php";
    include_once "../classe/retangulo.class.php";
    $base_retangulo = isset($_GET['base_retangulo']) ? $_GET['base_retangulo'] : 0;
    $cor = isset($_GET['cor']) ? $_GET['cor'] : "";
    $id_retangulo = isset($_GET['id_retangulo']) ? $_GET['id_retangulo'] : 0;
    $altura_retangulo = isset($_GET['altura_retangulo']) ? $_GET['altura_retangulo'] : 0;
    $idtabu = isset($_GET['idtabu']) ? $_GET['idtabu'] : 0;

?>
<html lang="en">
<head>
     <style>
    div{
        background-color : <?php echo $cor; ?>;
        width: <?php echo $altura_retangulo ?>px;
        height: <?php echo $base_retangulo ?>px;
    }
    </style> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $ret = new retangulo("1", $altura_retangulo, $base_retangulo, $cor, $idtabu);
        echo $ret;
    echo $ret->desenha();
    ?>
    <div></div>
</body>
</html>
