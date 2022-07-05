<?php

    require_once "../classe/cubo.class.php";

    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    require_once "../classe/quadrado.class.php";

$acao=isset($_GET["acao"])?$_GET["acao"]:"";
$altura_retangulo=isset($_GET["altura_retangulo"])?$_GET["altura_retangulo"]:"";
$base_retangulo=isset($_GET["base_retangulo"])?$_GET["base_retangulo"]:"";
$cor=isset($_GET["cor"])?$_GET["cor"]:"";
$id_cubo=isset($_GET["id_cubo"])?$_GET["id_cubo"]:"";
$id=isset($_GET["id"])?$_GET["id"]:"";


if($acao == "salvar"){
    $id_cubo= isset($_GET['id_cubo']) ? $_GET['id_cubo'] : "";
        if($id == 0){

            $altura_retangulo=isset($_GET["altura_retangulo"])?$_GET["altura_retangulo"]:"";
            $base_retangulo=isset($_GET["base_retangulo"])?$_GET["base_retangulo"]:"";
            $cor=isset($_GET["cor"])?$_GET["cor"]:"";
            $id_cubo=isset($_GET["id_cubo"])?$_GET["id_cubo"]:"";
            $id=isset($_GET["id"])?$_GET["id"]:"";

        $cub = new cubo($id_cubo, $cor, $quadrado_id);

             $cub->inserir();
            header("location:index.php");
        }  
else {

    $cub = new cubo($id_cubo, $cor, $quadrado_id);
    
    $funcao = $cub->editar();
    header("location:index.php");
 }
 }
 
 else if($acao == "excluir"){
    $id_cubo = isset($_GET['id_cubo']) ? $_GET['id_cubo'] : "";

$cub = new cubo($id_cubo, "", "0");

    $cub->excluir();
    header("location:index.php");

//echo "entrou aqui  : ".$id_retangulo;

}

//Consultar dados
function buscarDados($id_cubo){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM cubo WHERE id_cubo= $id_cubo");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['id_cubo'] = $linha['id_cubo'];
        $dados['cor'] = $linha['cor'];
        $dados['quadrado_id'] = $linha['quadrado_id'];
    }
    //var_dump($dados);
    return $dados;
}


// function lista_tabuleiro($id_retangulotabu){
//     $tab = new Tabuleiro("","");
//     $lista = $tab->buscar($id_retangulotabu);
//     return exibir(array('id_retangulo_tabuleiro', 'altura'), $lista);

// }

    ?>
