<?php

    require_once "../classe/quadrado.class.php";

    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    require_once "../classe/tabuleiro.class.php";

$acao=isset($_GET["acao"])?$_GET["acao"]:"";
$altura=isset($_GET["altura"])?$_GET["altura"]:"";
$cor=isset($_GET["cor"])?$_GET["cor"]:"";
$id_retangulo=isset($_GET["id_retangulo"])?$_GET["id_retangulo"]:"";

if($acao == "salvar"){
    $id_retangulo= isset($_GET['id_retangulo']) ? $_GET['id_retangulo'] : "";
        if($id_retangulo == 0){

            $altura=isset($_GET["altura"])?$_GET["altura"]:"";
            $cor=isset($_GET["cor"])?$_GET["cor"]:"";
            $id_retangulo=isset($_GET["id_retangulo"])?$_GET["id_retangulo"]:"";

        $ret = new retangulo($id_retangulo, $base_retangulo, $altura_retangulo, $cor);

            $funcao = $quad->inserir();
            header("location:index.php");
        }  
else {

    $ret = new retangulo($id_retangulo, $base_retangulo, $altura_retangulo, $cor);
    
    $funcao = $ret->editar();
    header("location:index.php");
 }
 }
 
 else if($acao == "excluir"){

    $ret = new retangulo($id_retangulo, $base_retangulo, $altura_retangulo, $cor);
    
    $ret->excluir();
    header("location:index.php");

//echo "entrou aqui  : ".$id_retangulo;

}

//Consultar dados
function buscarDados($id_retangulo){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM quadrado WHERE id_retangulo= $id_retangulo");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['id_retangulo'] = $linha['id_retangulo'];
        $dados['altura'] = $linha['altura'];
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
