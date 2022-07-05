<!DOCTYPE html>
<html lang="en">
<head>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
 

<script>
        function excluirRegistro(url){
            if (confirm("Confirma Exclusão?"))
                location.href = url;
        }
    </script>
<center>




<?php

include_once ("../classe/autoload.php");

    //require_once "../classe/tabuleiro.class.php";

    //require_once "../classe/quadrado.class.php";
    //include_once "../classe/retangulo.class.php";
    include_once "acao.php";
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";

$ret = new retangulo("", "", "", "", "");
//echo $quad;

echo "<br>";

$tabu = new tabuleiro(0,0);



    $procurar = isset($_POST["procurar"]) ? $_POST["procurar"] : ""; 
    $procura = isset($_POST["procura"]) ? $_POST["procura"] : "";
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : "";
    $base_retangulo = isset($_GET['base_retangulo']) ? $_GET['base_retangulo'] : 0;
    $cor = isset($_GET['cor']) ? $_GET['cor'] : "";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    $id_retangulo = isset($_GET['id_retangulo']) ? $_GET['id_retangulo'] : 0;
    $altura_retangulo = isset($_GET['altura_retangulo']) ? $_GET['altura_retangulo'] : 0;


if($acao == "editar"){


    $dados = retangulo::listar(1, $id);
//var_dump($dados);
echo $dados[0]["id_retangulo"];
    $ret = new retangulo($dados[0]["id_retangulo"],$dados[0]["altura_retangulo"] , $dados[0]["base_retangulo"], $dados[0]["cor"], $dados[0]["tabuleiro_id_tabuleiro"]);

}
?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>apresentar dados</title>

</head>
<body class="body">

    <div class="margin-top">
        <div class="container-fluid">

<table border="1" class="table table-striped">

<tr>
    <th>id</th>
    <th>altura</th>
    <th>base</th>
    <th>cor</th>
    <th>id tabuleiro</th>

</tr>

<form method="get" action="acao.php">
  Escolha o Tabuleiro
    <select name="idtabu"  id="idtabu" value="<?php if($acao == "editar") echo $quad->getlado()  ?>">
        <?php
         $tabu->monta_option(0);

        ?> 
        </select>
        <br>

id: <input readonly type="text" name="id" id="id "value="<?php if($acao == "editar") echo $quad->getid();  else echo 0;?>"> <br><br>
altura do quadrado: <input type="text"  name="altura_retangulo" id="altura_retangulo" value="<?php if($acao == "editar") echo $quad->getaltura()  ?>"><br><br>
base do quadrado: <input type="text"  name="base_retangulo" id="base_retangulo" value="<?php if($acao == "editar") echo $quad->getbase()  ?>"><br><br>
cor: <input type="color" name="cor" id="cor "value="<?php if($acao == "editar") echo $quad->getcor()  ?>"><br><br>

<button class="btn btn-primary" type="submit" name="acao" value="salvar">salvar</button>

</form>
</div>
</div>

<?php

//$pdo = Conexao::getInstance();

$consulta = retangulo::listar($tipo, $procurar); // Método com "static"
//var_dump($consulta);
    //$consulta = $quad->listar($tipo, $procurar); Método antigo com "public Function"

    //while ($linha = $consulta->fetchAll()) {
foreach($consulta as $linha){
?>

<br><br>
<tr>
    <td><?php echo $linha['id_retangulo'];?></td>
    <td><?php echo $linha['altura_retangulo'];?></td> 
    <td><?php echo $linha['base_retangulo'];?></td> 
    <td><?php echo $linha['cor'];?></td> 
    <td><?php echo $linha['tabuleiro_id_tabuleiro'];?></td> 

    <td><?php echo "<a href='mostrar.php?altura_retangulo=".$linha['altura_retangulo']."&base_retangulo=".$linha['base_retangulo']."&cor=".$linha['cor']."'> mostrar </a> " ;?></td> 
    <td><a href="javascript:excluirRegistro('acao.php?acao=excluir&id=<?php echo $linha['id_retangulo'];?>')">deletar</a></td>
    <td><a href='index.php?acao=editar&id=<?php echo $linha['id_retangulo'];?>'>editar</a></td>
</tr>

<?php } ?>

</table>

<button type="button" class="btn btn-dark"><a href="consulta.php"> consulta </a></button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</center>
<li> <a href="../quadrado../index.php"> quadrado </a> </li>
<li> <a href="../triangulo../index.php"> triângulo  </a> </li>
<li> <a href="../circulo../index.php"> círculo </a> </li>


</body>
</html>

