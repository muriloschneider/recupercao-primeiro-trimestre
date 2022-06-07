<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


<center>
<script>
        function excluirRegistro(url){
            if (confirm("Confirma Exclusão?"))
                location.href = url;
        }
    </script>

    <?php
    require_once "../classe/usuario.class.php";
    include_once "acaousu.php";
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";

$usu = new usuario("1", "", "", "");

    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
    $procura = isset($_POST["procura"]) ? $_POST["procura"] : "";
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : 1;
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";

    $nomeusu = isset($_GET['nomeusu']) ? $_GET['nomeusu'] : 0;
    $login = isset($_GET['login']) ? $_GET['login'] : "";
    $senha = isset($_GET['senha']) ? $_GET['senha'] : "";
    $idusu = isset($_GET['idusu']) ? $_GET['idusu'] : "";



if($acao == "editar"){

//echo $idusu, $nomeusu, $login, $senha;
    $idusu = isset($_GET['idusu']) ? $_GET['idusu'] : "";

    $usu = new usuario($idusu,$nomeusu,$login,$senha);

    $dados = $usu->buscar($idusu);

    $usu = new usuario($dados["id_usuario"],$dados["nome_usuario"] , $dados["login"], $dados["senha"]);
//echo $dados["id_usuario"],$dados["nome_usuario"] , $dados["login"], $dados["senha"];
}
?>



    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>apresentar dados</title>

</head>
<body>

    <div class="margin-top">
    <div class="container-fluid">

<table border="1" class="table table-striped">


    <tr>
        <th>id</th>
        <th>nome</th>
        <th>login</th>
        <th>senha</th>
    </tr>

<form method="get" action="acaousu.php">

    id: <input readonly type="text" name="idusu" id="idusu" value="<?php if($acao == "editar") echo $usu->getidusu();  else echo 0;?>"> <br><br>
    nome: <input type="text"  name="nomeusu" id="nomeusu" value="<?php if($acao == "editar") echo $usu->getnomeusu()  ?>"><br><br>
    login: <input type="text"  name="login" id="login" value="<?php if($acao == "editar") echo $usu->getlogin()  ?>"><br><br>
    senha: <input type="text" name="senha" id="senha "value="<?php if($acao == "editar") echo $usu->getsenha()  ?>">

    <input type="submit" name="acao" value="salvar">
</form>
</div>
</div>
<?php

$pdo = Conexao::getInstance();

$consulta = $usu->listar($tipo, $procurar);

    
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
?>
<br><br>
<tr>
    <td><?php echo $linha['id_usuario'];?></td>
    <td><?php echo $linha['nome_usuario'];?></td> 
    <td><?php echo $linha['login'];?></td> 
    <td><?php echo $linha['senha'];?></td> 
    <!-- <td><?php // echo "<a href='mostrar.php?lado=".$linha['lado']."&cor=".$linha['cor']."'> mostrar </a> " ;?></td>  -->
    <td><a href="javascript:excluirRegistro('acaousu.php?acao=excluir&idusu=<?php echo $linha['id_usuario'];?>')">deletar</a></td>
    <td><a href='usuario.php?acao=editar&idusu=<?php echo $linha['id_usuario'];?>'>editar</a></td>
</tr>



<?php } ?> 
</table>
<a href="consulta.php"> consulta </a>
</center>
</body>
</html>

