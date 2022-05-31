<?php

require_once "quadrado.class.php";

$acao=isset($_GET["acao"])?$_GET["acao"]:"";
$lado=isset($_GET["lado"])?$_GET["lado"]:"";
$cor=isset($_GET["cor"])?$_GET["cor"]:"";
$id=isset($_GET["id"])?$_GET["id"]:"";

if($acao == "salvar"){
    $id= isset($_POST['id']) ? $_POST['id'] : "";
    if($id == 0){

 $quad = new quadrado("0", $lado, $cor);

   
    $funcao = $quad->inserir();
    header("location:index.php");
       
}  

else {

 $quad = new quadrado($id, $lado, $cor);
    
   
 $funcao = $quad->editar();
 header("location:index.php");
 }
 }
 //echo "entrou aqui  : ".$id;



else if($acao == "excluir"){

    $quad = new quadrado($id, "", "");
    
   
$quad->excluir();
header("location:index.php");

//echo "entrou aqui  : ".$id;

}
//Consultar dados
function buscarDados($id){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM quadrado WHERE id= $id");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['id'] = $linha['id'];
        $dados['lado'] = $linha['lado'];
        $dados['cor'] = $linha['cor'];

    }
    //var_dump($dados);
    return $dados;
}

    ?>
