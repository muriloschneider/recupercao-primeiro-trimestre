<!DOCTYPE html>
<html lang="en">
<head>

<?php
include_once "quadrado.class.php";
include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

$quad = new quadrado("1", 0, "");

$procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
   $procura = isset($_POST["procura"]) ? $_POST["procura"] : "";

?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<table border="1">

<tr>
    <th>id</th>
    <th>lado</th>
    <th>cor</th>
    <th>mostrar</th>
</tr>

<?php

$sql = "";
if ($tipo == 1){
    $sql = "SELECT * FROM quadrado WHERE id = $procurar ORDER BY id";
}else{    
    $sql = "SELECT * FROM quadrado WHERE lado LIKE '$procurar%' ORDER BY lado";
}

$pdo = Conexao::getInstance();
    
    if($procura==""){
        $consulta = $pdo->query("SELECT * FROM quadrado 
                                 WHERE lado LIKE '$procurar%' 
                                 ORDER BY lado");
}

else if($procura=="pro2"){
    $consulta = $pdo->query("SELECT * FROM quadrado 
                             WHERE cor LIKE '$procurar%' 
                             ORDER BY cor");
}

else if($procura=="pro1"){
    $consulta = $pdo->query("SELECT * FROM quadrado 
                             WHERE lado = '$procurar%' 
                             ORDER BY lado");
}




    
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
?>


<tr><td><?php echo $linha['id'];?></td>
    <td><?php echo $linha['lado'];?></td> 
    <td><?php echo $linha['cor'];?></td> 
    <td><?php echo "<a href='processa.php?lado=".$linha['lado']."&cor=".$linha['cor']."'> mostrar </a> " ;?></td> 
</tr>

<?php } ?>
</table>

<a href="index.php"> index </a> <br><br>
<a href="mostrar.php"> mostrar </a>

</body>
</html>