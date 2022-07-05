<!DOCTYPE html>
<?php
    // include_once "../classe/forma.class.php";
    // require_once "../classe/databassed.class.php";
    include_once "../classe/circulo.class.php";

    $raio_circulo = isset($_GET['raio_circulo']) ? $_GET['raio_circulo']: 0;
    $cor = isset($_GET['cor']) ? $_GET['cor']: "";
    $idtabu = isset($_GET['idtabu']) ? $_GET['idtabu']: "";
    $id_circulo = isset($_GET['id_circulo']) ? $_GET['id_circulo']: "";
// var_dump($_GET);
?>
<html lang="en">
<head>
    <style>
    /* div{
        background-color : <?php //echo "#".$cor; ?>;
        width: <?php //echo $raio_circulo(); ?>px;
        height: <?php// echo $this->diametro(); ?>px; */
<?php
    //     $circ = new circulo($id_circulo, $raio_circulo, $cor, $idtabu);
    // echo $circ;
    // echo $circ->desenha();
?>
        /* $str = "<div  width: ".$this->Diametro()."vw; height: ".$this->Diametro()."vw;
         background: ".$this->getcor().";'></div><br>"; */
    /* } */
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $circ = new circulo($id_circulo, $raio_circulo, $cor, $idtabu);
    echo $circ->desenha();
   
   
    ?>
    <div></div>
</body>
</html>
