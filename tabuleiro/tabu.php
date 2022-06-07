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
    include_once "acaotabu.php";
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";

$tab = new Tabuleiro("1", 0);


    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
    $procura = isset($_POST["procura"]) ? $_POST["procura"] : "";
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : 1;
    $lado = isset($_GET['lado']) ? $_GET['lado'] : 0;
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
$idtabu = 0;



if($acao == "editar"){

 
$idtabu = isset($_GET['idtabu']) ? $_GET['idtabu'] : "";

$tab = new Tabuleiro($idtabu, $ladotabu);


$dados = $tab->buscar($idtabu);

$tab = new tabuleiro($dados["id_tabuleiro"],$dados["lado_tabuleiro"]);

}
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
</tr>

<form method="get" action="acaotabu.php">


id: <input readonly type="text" name="idtabu" id="idtabu" value="<?php if($acao == "editar") echo $tab->getidtabu();  else echo 0;?>"> <br><br>
lado do tabuleiro: <input type="text"  name="ladotabu" id="ladotabu" value="<?php if($acao == "editar") echo $tab->getlado()?>"><br><br>

<input type="submit" name="acao" value="salvar">
</form>

<?php

$pdo = Conexao::getInstance();
if($procura==""){
    $consulta = $pdo->query("SELECT * FROM tabuleiro 
                             WHERE id_tabuleiro LIKE '$procurar%'
                             ORDER BY id_tabuleiro");
}

 else if($procura=="pro1"){
    $consulta = $pdo->query("SELECT * FROM tabuleiro 
                             WHERE id_tabuleiro LIKE '$procurar%'
                             ORDER BY id_tabuleiro");
}

 else if($procura=="pro2"){
    $consulta = $pdo->query("SELECT * FROM tabuleiro 
                             WHERE lado_tabuleiro LIKE '$procurar%' 
                             ORDER BY lado_tabuleiro");
}



    
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
?>
<br><br>
<tr><td><?php echo $linha['id_tabuleiro'];?></td>
    <td><?php echo $linha['lado_tabuleiro'];?></td> 
    <td><a href="javascript:excluirRegistro('acaotabu.php?acao=excluir&idtabu=<?php echo $linha['id_tabuleiro'];?>')">deletar</a></td>
    <td><a href='tabu.php?acao=editar&idtabu=<?php echo $linha['id_tabuleiro'];?>'>editar</a></td>
</tr>



<?php } ?> 
</table>
<a href="consulta.php"> consulta </a>
</body>
</html>

