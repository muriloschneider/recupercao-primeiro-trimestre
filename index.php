<!DOCTYPE html>
<html lang="en">
<head>

<script>
        function excluirRegistro(url){
            if (confirm("Confirma Exclusão?"))
                location.href = url;
        }
    </script>

    <?php
include_once "quadrado.class.php";

include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

$quad = new quadrado("1", 0, "");

$procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
   $procura = isset($_POST["procura"]) ? $_POST["procura"] : "";
   
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : 1;

?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>apresentar dados</title>

</head>
<body>
<table border="1">

<tr>
    <th>id</th>
    <th>lado</th>
    <th>cor</th>
    <th>mostrar</th>
</tr>

<form method="get" action="acao.php">

lado do quadrado: <input type="text" name="lado" id="lado" value=""><br><br>
cor: <input type="color" name="cor" id="cor "value="">

<input type="submit" name="acao" value="salvar">
</form>

<?php

// $pdo = Conexao::getInstance();
// if($procura==""){
//     $consulta = $pdo->query("SELECT * FROM quadrado 
//                              WHERE id LIKE '$procurar%'
//                              ORDER BY id");
// }

//  else if($procura=="pro1"){
//     $consulta = $pdo->query("SELECT * FROM quadrado 
//                              WHERE id LIKE '$procurar%'
//                              ORDER BY id");
// }

//  else if($procura=="pro2"){
//     $consulta = $pdo->query("SELECT * FROM quadrado 
//                              WHERE lado LIKE '$procurar%' 
//                              ORDER BY lado");
// }



// else if($procura=="pro3"){
//     $consulta = $pdo->query("SELECT * FROM quadrado 
//                              WHERE cor LIKE '$procurar%' 
//                              ORDER BY cor");
// }


    
//while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
?>
<br><br>
<tr><td><?php echo $linha['id'];?></td>
    <td><?php echo $linha['lado'];?></td> 
    <td><?php echo $linha['cor'];?></td> 
    <td><?php echo "<a href='mostrar.php?lado=".$linha['lado']."&cor=".$linha['cor']."'> mostrar </a> " ;?></td> 
    <td><a href="javascript:excluirRegistro('acao.php?acao=excluir&id=<?php echo $linha['id'];?>')">deletar</a></td>
    <td><a href='acao.php?acao=editar&id=<?php echo $linha['id'];?>'>editar</a></td>
</tr>



<?php //} ?> 
</table>
<a href="consulta.php"> consulta </a>
</body>
</html>

