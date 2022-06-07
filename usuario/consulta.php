<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


<center>

<?php

    include_once "../classe/usuario.class.php";

    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";

$usu = new usuario("1", "", "", "");

$procurar = isset($_GET["procurar"]) ? $_GET["procurar"] : "";    
$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : 1;

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


<tr> <p> pesquisar por: </p>
    <th>id</th>
    <th>nome</th>
    <th>login</th>
    <th> senha</th>

</tr>
<form> 

<input type="text" name="procurar" value="<?php echo $procurar;?>">
        <br>
            <input type="radio" name="tipo" value="1" <?php if ($tipo == "1") echo "checked" ?>> ID<br>
            <input type="radio" name="tipo" value="2" <?php if ($tipo == "2") echo "checked" ?>> nome<br>
            <input type="radio" name="tipo" value="3" <?php if ($tipo == "3") echo "checked" ?>> login<br>
            <input type="radio" name="tipo" value="4" <?php if ($tipo == "4") echo "checked" ?>> senha<br>

        <br>
            <button class="btn btn-dark" type="submit" name="acao" id="acao">Consulta</button>
</form>

</div>
</div>

<?php

    $consulta = $usu->listar($tipo, $procurar);

    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
?>

<br><br>

<tr>
    <td><?php echo $linha['id_usuario'];?></td>
    <td><?php echo $linha['nome_usuario'];?></td> 
    <td><?php echo $linha['login'];?></td> 
    <td><?php echo $linha['senha'];?></td> 
</tr>


<?php } ?> 
</table>
<a href="usuario.php"> usuario </a>
</center>
</body>
</html>