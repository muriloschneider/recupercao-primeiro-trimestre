<!DOCTYPE html>
<html lang="en">
<head>



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
<table border="1">

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
            <button type="submit" name="acao" id="acao">Consulta</button>
 </form>

<?php


$consulta = $usu->listar($tipo, $procurar);




while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
?>
<br><br>
<tr><td><?php echo $linha['id_usuario'];?></td>
    <td><?php echo $linha['nome_usuario'];?></td> 
    <td><?php echo $linha['login'];?></td> 
    <td><?php echo $linha['senha'];?></td> 

    <td><?php //echo "<a href='mostrar.php?lado=".$linha['lado']."&cor=".$linha['cor']."'> mostrar </a> " ;?></td> 

</tr>


<?php } ?> 
</table>
<a href="index.php"> index </a>
</body>
</html>