

    <?php
include_once "quadrado.class.php";

include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";


$id = 24;
$quad = new quadrado(0, 0 , "");


$dados = $quad->buscar($id);

$quad = new quadrado($dados["id"],$dados["lado"] , $dados["cor"]);


echo $quad;





?>
