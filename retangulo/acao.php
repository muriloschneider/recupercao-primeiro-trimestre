<?php

    require_once "../classe/retangulo.class.php";

    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    require_once "../classe/tabuleiro.class.php";

$acao=isset($_GET["acao"])?$_GET["acao"]:"";
$altura_retangulo=isset($_GET["altura_retangulo"])?$_GET["altura_retangulo"]:"";
$base_retangulo=isset($_GET["base_retangulo"])?$_GET["base_retangulo"]:"";
$cor=isset($_GET["cor"])?$_GET["cor"]:"";
$id=isset($_GET["id"])?$_GET["id"]:"";
$idtabu=isset($_GET["idtabu"])?$_GET["idtabu"]:"";


if($acao == "salvar"){
    $id= isset($_GET['id']) ? $_GET['id'] : "";
        if($id == 0){

            $altura_retangulo=isset($_GET["altura_retangulo"])?$_GET["altura_retangulo"]:"";
            $base_retangulo=isset($_GET["base_retangulo"])?$_GET["base_retangulo"]:"";
            $cor=isset($_GET["cor"])?$_GET["cor"]:"";
            $id=isset($_GET["id"])?$_GET["id"]:"";
            $idtabu=isset($_GET["idtabu"])?$_GET["idtabu"]:"";

        $ret = new retangulo($id_retangulo, $altura_retangulo, $base_retangulo, $cor, $idtabu);
       // $ret = new retangulo($id_retangulo, "0", "0", "0", "0");

             $ret->inserir();
            header("location:index.php");
        }  
else {

    $ret = new retangulo($id_retangulo, $base_retangulo, $altura_retangulo, $cor, $idtabu);
    
    $funcao = $ret->editar();
    header("location:index.php");
 }
 }
 
 else if($acao == "excluir"){
    $id = isset($_GET['id']) ? $_GET['id'] : "";

    //$ret = new retangulo($id_retangulo, $altura_retangulo , $base_retangulo, $cor, $idtabu);
    $ret = new retangulo($id, "0" , "0", "0", "0");

    $ret->excluir();
    header("location:index.php");

//echo "entrou aqui  : ".$id_retangulo;

}

//Consultar dados
function buscarDados($id_retangulo){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM retangulo WHERE id_retangulo= $id_retangulo");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['id_retangulo'] = $linha['id_retangulo'];
        $dados['altura_retangulo'] = $linha['altura_retangulo'];
        $dados['base_retangulo'] = $linha['base_retangulo'];
        $dados['cor'] = $linha['cor'];
        $dados['tabuleiro_id_retangulo_tabuleiro'] = $linha['tabuleiro_id_retangulo_tabuleiro'];
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
