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

$tab = new Tabuleiro(0, 0);


$dados = $tab->buscar($id);

$tab = new tabuleiro($dados["id_tabuleiro"],$dados["lado_tabueiro"]);

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
    
    <th>mostrar</th>
</tr>

<form method="get" action="acao.php">
 <!-- Escolha o Tabuleiro
                    <select name="idtabu"  id="idtabu" value="<?php // if ($acao == "editar") echo $quad->getidtabu(); ?>"> -->
                         <?php
                            //echo lista_tabuleiro(0); 
                        ?> 

id: <input readonly type="text" name="id" id="id "value="<?php if($acao == "editar") echo $tab->getidtabu();  else echo 0;?>"> <br><br>
lado do tabuleiro: <input type="text"  name="lado" id="lado" value="<?php if($acao == "editar") echo $tab->getlado()  ?>"><br><br>


<input type="submit" name="acao" value="salvar">
</form>

<?php

$pdo = Conexao::getInstance();
if($procura==""){
    $consulta = $pdo->query("SELECT * FROM quadrado 
                             WHERE id LIKE '$procurar%'
                             ORDER BY id");
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
<tr><td><?php echo $linha['id'];?></td>
    <td><?php echo $linha['lado'];?></td> 
    <td><?php echo "<a href='mostrar.php?lado=".$linha['lado']."&cor=".$linha['cor']."'> mostrar </a> " ;?></td> 
    <td><a href="javascript:excluirRegistro('acaotabu.php?acao=excluir&id_tabuleiro=<?php echo $linha['id_tabuleiro'];?>')">deletar</a></td>
    <td><a href='tabu.php?acao=editar&idtabu=<?php echo $linha['id_tabuleiro'];?>'>editar</a></td>
</tr>



<?php } ?> 
</table>
<a href="consulta.php"> consulta </a>
</body>
</html>

