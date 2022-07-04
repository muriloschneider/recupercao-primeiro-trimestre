<?php

    require_once "../classe/circulo.class.php";

    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    require_once "../classe/tabuleiro.class.php";

$acao=isset($_GET["acao"])?$_GET["acao"]:"";
$raio_circulo=isset($_GET["raio_circulo"])?$_GET["raio_circulo"]:"";
$cor=isset($_GET["cor"])?$_GET["cor"]:"";
$id=isset($_GET["id"])?$_GET["id"]:"";

$idtabu=isset($_GET["idtabu"])?$_GET["idtabu"]:"";

if($acao == "salvar"){
    $id= isset($_GET['id']) ? $_GET['id'] : "";
        if($id == 0){

            $raio_circulo=isset($_GET["raio"])?$_GET["raio" ]:"";
            $cor=isset($_GET["cor"])?$_GET["cor"]:"";
            $idtabu=isset($_GET["idtabu"])?$_GET["idtabu"]:"";

            $circ = new circulo($id_circulo, $raio_circulo, $cor, $idtabu);

            $funcao = $circ->inserir();
            header("location:index.php");
        }  
else {

    $circ = new circulo($id_circulo, $raio_circulo, $cor, $idtabu);

     $circ->editar();
    header("location:index.php");
 }
 }
 
 else if($acao == "excluir"){

    $circ = new circulo($id, "0", "0", "0");

    $circ->excluir();
    header("location:index.php");

}

function buscarDados($id){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM circulo WHERE id_circulo= $id_circulo");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['id_circulo'] = $linha['id_circulo'];
        $dados['raio_circulo'] = $linha['raio_circulo'];
        $dados['cor'] = $linha['cor'];
        $dados['tabuleiro_id_tabuleiro'] = $linha['tabuleiro_id_tabuleiro'];
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

function lista_tabuleiro($idtabu){
    $tab = new Tabuleiro("","");
    $lista = $tab->buscar($idtabu);
    return exibir(array('id_tabuleiro', 'lado'), $lista);

}

    ?>
