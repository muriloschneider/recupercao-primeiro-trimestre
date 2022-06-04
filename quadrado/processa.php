<!DOCTYPE html>
<?php
    include_once "quadrado.class.php";
    $lado = isset($_GET['lado']) ? $_GET['lado']: 0;
    $cor = isset($_GET['cor']) ? $_GET['cor']: "";
?>
<html lang="en">
<head>
    <style>
    div{
        background-color : <?php echo $cor; ?>;
        width: <?php echo $lado ?>px;
        height: <?php echo $lado ?>px;
    }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $quad = new quadrado("1", $lado, $cor);
    echo $quad;
    
    ?>

    <div></div>
</body>
</html>
