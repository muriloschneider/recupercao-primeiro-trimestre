<?php

    
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
   require_once "../classe/tabuleiro.class.php";

$acao=isset($_GET["acao"])?$_GET["acao"]:"";
$ladotabu=isset($_GET["ladotabu"])?$_GET["ladotabu"]:"";
$idtabu=isset($_GET["idtabu"])?$_GET["idtabu"]:"";

if($acao == "salvar"){
    $idtabu= isset($_GET['idtabu']) ? $_GET['idtabu'] : "";
    if($idtabu == 0){

 $tab = new Tabuleiro($idtabu,$ladotabu);
   
    $funcao = $tab->inserir();
    header("location:tabu.php");
       
}  

else {

 $tab = new Tabuleiro($idtabu,$ladotabu);

   
 $funcao = $tab->editar();
 header("location:tabu.php");
 //echo "entrou aqui  : ".$id;
 }
 }
 



else if($acao == "excluir"){

    $tab = new Tabuleiro($idtabu, 0);

   
$tab->excluir();
header("location:index.php");

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

// function exibir($chave, $dados){
//     $str = 0;
//     foreach($dados as $linha){
//         $str .= "<option value='".$linha[$chave[0]]."'>ID: ".$linha[$chave[0]]." | Lado: ".$linha[$chave[1]]."</option>";
//     }
//     return $str;
// }

// function lista_tabuleiro($idtabu){
//     $tab = new Tabuleiro("","");
//     $lista = $tab->buscar($idtabu);
//     return exibir(array('id_tabuleiro', 'lado'), $lista);

// }

    ?>
