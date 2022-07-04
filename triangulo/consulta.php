<!DOCTYPE html>
<html lang="en">
<head>

<?php
    include_once "../classe/triangulo.class.php";
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";

    $tri = new triangulo("1", "0", "0", "", "0", "0");

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
    <th>lado um</th>
    <th>lado dois</th>
    <th> cor</th>
    <th> id tabu</th>
    <th>base</th>

</tr>
<form>    
<input type="text" name="procurar" value="<?php echo $procurar;?>">
            <br>
            <input type="radio" name="tipo" value="1" <?php if ($tipo == "1") echo "checked" ?>> ID<br>
            <input type="radio" name="tipo" value="2" <?php if ($tipo == "2") echo "checked" ?>> lado um<br>
            <input type="radio" name="tipo" value="4" <?php if ($tipo == "3") echo "checked" ?>> lado dois<br>
            <input type="radio" name="tipo" value="5" <?php if ($tipo == "6") echo "checked" ?>> base<br>

                    <br>
            <button type="submit" name="acao" id="acao">Consulta</button>
 </form>

<?php
    
    $consulta = $tri->listar($tipo, $procurar);

    //while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        foreach($consulta as $linha){

?>

<br><br>

<tr>
    <td><?php echo $linha['id_triangulo'];?></td>
    <td><?php echo $linha['ladoum'];?></td> 
    <td><?php echo $linha['ladodois'];?></td> 
    <td><?php echo $linha['cor'];?></td> 
    <td><?php echo $linha['tabuleiro_id_tabuleiro'];?></td> 
    <td><?php echo $linha['base_triangulo'];?></td> 

</tr>


<?php } ?> 
</table>
<a href="index.php"> index </a>
</body>
</html>