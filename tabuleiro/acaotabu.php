<?php

    
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
   require_once "../classe/tabuleiro.class.php";

$acao=isset($_GET["acao"])?$_GET["acao"]:"";
$ladotabu=isset($_GET["ladotabu"])?$_GET["ladotabu"]:"";
$idtabu=isset($_GET["idtabu"])?$_GET["idtabu"]:"";
$tabu = new tabuleiro($idtabu,$ladotabu);


if($acao == "salvar"){
    $idtabu= isset($_GET['idtabu']) ? $_GET['idtabu'] : "";
    if($idtabu == 0){
        $funcao = $tabu->inserir();
    }  

else{
        $funcao = $tabu->editar();
 //echo "entrou aqui  : ".$id;
    }
 header("location:tabu.php");

    }
 



else if($acao == "excluir"){
    $idtabu= isset($_GET['idtabu']) ? $_GET['idtabu'] : "";

    $tab = new Tabuleiro($idtabu, "");
// echo $idtabu;
   
$tab->excluir();
header("location:tabu.php");

//echo "entrou aqui  : ".$id;

}

//Consultar dados
function buscarDados($idtabu){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM tabuleiro WHERE id_tabuleiro= $id_tabuleiro");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['id_tabuleiro'] = $linha['id_tabuleiro'];
        $dados['lado_tabuleiro'] = $linha['lado_tabuleiro'];
        
    }
    //var_dump($dados);
    return $dados;
}



// function lista_tabuleiro($idtabu){
//     $tab = new Tabuleiro("","");
//     $lista = $tab->buscar($idtabu);
//     return exibir(array('id_tabuleiro', 'lado'), $lista);

// }

    ?>
