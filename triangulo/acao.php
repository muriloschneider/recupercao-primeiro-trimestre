<?php

    require_once "../classe/triangulo.class.php";

    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    require_once "../classe/tabuleiro.class.php";

$acao=isset($_GET["acao"])?$_GET["acao"]:"";
$ladoum=isset($_GET["ladoum"])?$_GET["ladoum"]:"";
$ladodois=isset($_GET["ladodois"])?$_GET["ladodois"]:"";
$base_triangulo=isset($_GET["base_triangulo"])?$_GET["base_triangulo"]:"";
$cor=isset($_GET["cor"])?$_GET["cor"]:"";
$id=isset($_GET["id"])?$_GET["id"]:"";
$idtabu=isset($_GET["idtabu"])?$_GET["idtabu"]:"";


if($acao == "salvar"){
    $id= isset($_GET['id']) ? $_GET['id'] : "";
        if($id == 0){

            
            

            $tri = new triangulo($id_triangulo, $ladoum, $ladodois, $cor, $idtabu, $base_triangulo);
            // $ret = new retangulo($id_retangulo, "0", "0", "0", "0");

             $tri->inserir();
            header("location:index.php");
        }  
else {

    $tri = new triangulo($id_triangulo, $ladoum, $ladodois, $cor, $idtabu, $base_triangulo);
    
    $funcao = $tri->editar();
    header("location:index.php");
 }
 $ladoum=isset($_GET["ladoum"])?$_GET["ladoum"]:"";
            $ladodois=isset($_GET["ladodois"])?$_GET["ladodois"]:"";
            $base_triangulo=isset($_GET["base_triangulo"])?$_GET["base_triangulo"]:"";
            $cor=isset($_GET["cor"])?$_GET["cor"]:"";
            $id_triangulo=isset($_GET["id_triangulo"])?$_GET["id_triangulo"]:"";
            $idtabu=isset($_GET["idtabu"])?$_GET["idtabu"]:"";
 }
 
 else if($acao == "excluir"){
    $id_triangulo = isset($_GET['id_triangulo']) ? $_GET['id_triangulo'] : "";

    //$ret = new retangulo($id_retangulo, $altura_retangulo , $base_retangulo, $cor, $idtabu);
    $tri = new triangulo($id_triangulo, "0", "0", "0", "0", "0");

    $tri->excluir();
    header("location:index.php");

//echo "entrou aqui  : ".$id_retangulo;

}

//Consultar dados
function buscarDados($id_triangulo){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM triangulo WHERE id_triangulo= $id_triangulo");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['id_triangulo'] = $linha['id_triangulo'];
        $dados['ladoum'] = $linha['ladoum'];
        $dados['ladodois'] = $linha['ladodois'];
        $dados['cor'] = $linha['cor'];
        $dados['tabuleiro_id_retangulo_tabuleiro'] = $linha['tabuleiro_id_retangulo_tabuleiro'];
        $dados['base_triangulo'] = $linha['base_triangulo'];

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
