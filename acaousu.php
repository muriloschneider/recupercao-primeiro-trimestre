<?php

    require_once "classe/usuario.class.php";
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

$acao=isset($_GET["acao"])?$_GET["acao"]:"";
$login=isset($_GET["login"])?$_GET["login"]:"";
$nomeusu=isset($_GET["nomeusu"])?$_GET["nomeusu"]:"";
$senha=isset($_GET["senha"])?$_GET["senha"]:"";

if($acao == "salvar"){
    $idusu= isset($_GET['idusu']) ? $_GET['idusu'] : "";
    if($idusu == 0){

 $usu = new usuario($idusu, $nomeusu, $login, $senha);

   
    $funcao = $usu->inserir();
    header("location:usuario.php");
       
}  

else {

 $usu = new usuario($idusu, $nomeusu, $login, $senha);
    
   
 $funcao = $usu->editar();
 header("location:usuario.php");
 //echo "entrou aqui  : ".$id;
 }
 }
 



 if($acao == "excluir"){

    $usu = new usuario($id_usuario, "", "", "");
    
   
$usu->excluir();
header("location:usuario.php");

//echo "entrou aqui  : ".$id;

}
//Consultar dados
function buscarDados($idusu){
    $pdo = Conexao::getInstance();
    $consulta = $pdo->query("SELECT * FROM usuario WHERE id_usuario= $id_usuario");
    $dados = array();
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $dados['id_usuario'] = $linha['id_usuario'];
        $dados['nome_usuario'] = $linha['nome_usuario'];
        $dados['login'] = $linha['login'];
        $dados['senha'] = $linha['senha'];
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
