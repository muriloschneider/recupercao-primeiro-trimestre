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
    require_once "classe/usuario.class.php";
    include_once "acaousu.php";
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

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

    $usu = new usuario($idusu,'','','');

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

<table border="1">

    <tr>
        <th>id</th>
        <th>nome</th>
        <th>login</th>
        <th>senha</th>
    </tr>

<form method="post" action="acaousu.php">
 <!-- Escolha o Tabuleiro
                    <select name="idtabu"  id="idtabu" value="<?php if ($acao == "editar") echo $quad->getidtabu(); ?>">
                         <?php
                            //echo lista_tabuleiro(0); 
                        ?>  -->
    id: <input readonly type="text" name="idusu" id="idusu" value="<?php if($acao == "editar") echo $usu->getidusu();  else echo 0;?>"> <br><br>
    nome: <input type="text"  name="nomeusu" id="nomeusu" value="<?php if($acao == "editar") echo $usu->getnomeusu()  ?>"><br><br>
    login: <input type="text"  name="login" id="login" value="<?php if($acao == "editar") echo $usu->getlogin()  ?>"><br><br>
    senha: <input type="text" name="senha" id="senha "value="<?php if($acao == "editar") echo $usu->getsenha()  ?>">

    <input type="submit" name="acao" value="salvar">
</form>

<?php

$pdo = Conexao::getInstance();
    if($procura==""){
        $consulta = $pdo->query("SELECT * FROM usuario 
                             WHERE id_usuario LIKE '$procurar%'
                             ORDER BY id_usuario");
}

    else if($procura=="pro1"){
        $consulta = $pdo->query("SELECT * FROM usuario 
                             WHERE id_usuario LIKE '$procurar%'
                             ORDER BY id_usuario");
}

    else if($procura=="pro2"){
        $consulta = $pdo->query("SELECT * FROM usuario 
                             WHERE nome_usuario LIKE '$procurar%' 
                             ORDER BY nome_usuario");
}



    else if($procura=="pro3"){
        $consulta = $pdo->query("SELECT * FROM usuario 
                             WHERE login LIKE '$procurar%' 
                             ORDER BY login");
}
    else if($procura=="pro4"){
        $consulta = $pdo->query("SELECT * FROM usuario 
                             WHERE senha LIKE '$procurar%' 
                             ORDER BY senha");
}

    
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
<a href="usuario/consulta.php"> consulta </a>
</body>
</html>

