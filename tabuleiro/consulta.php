<!DOCTYPE html>
<html lang="en">
<head>



    <?php
include_once "../classe/tabuleiro.class.php";

include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";

$tab = new Tabuleiro("1", 0);


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
    <th>lado</th>
    

</tr>
<form>    
<input type="text" name="procurar" value="<?php echo $procurar;?>">
            <br>
            <input type="radio" name="tipo" value="1" <?php if ($tipo == "1") echo "checked" ?>> ID<br>
            <input type="radio" name="tipo" value="2" <?php if ($tipo == "2") echo "checked" ?>> Lado<br>
         

                    <br>
            <button type="submit" name="acao" id="acao">Consulta</button>
 </form>

<?php


$consulta = $tab->listar($tipo, $procurar);




while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
?>
<br><br>
<tr><td><?php echo $linha['id_tabuleiro'];?></td>
    <td><?php echo $linha['lado_tabuleiro'];?></td> 
  

    <td><?php //echo "<a href='mostrar.php?lado=".$linha['lado']."&cor=".$linha['cor']."'> mostrar </a> " ;?></td> 

</tr>


<?php } ?> 
</table>
<a href="tabu.php"> tabu </a>
</body>
</html>