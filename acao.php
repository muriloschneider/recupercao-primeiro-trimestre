<?php

require_once "quadrado.class.php";

$acao=isset($_GET["acao"])?$_GET["acao"]:"";
$lado=isset($_GET["lado"])?$_GET["lado"]:"";
$cor=isset($_GET["cor"])?$_GET["cor"]:"";
$id=isset($_GET["id"])?$_GET["id"]:"";

if($acao == "salvar"){

    $quad = new quadrado("0", $lado, $cor);
    
   
$quad->inserir();
    header("location:index.php");
       
}       
    
else if($acao == "excluir"){

    $quad = new quadrado($id, "", "");
    
   
$quad->excluir();
header("location:index.php");

//echo "entrou aqui  : ".$id;

}

else if($acao == "editar"){

    $quad = new quadrado($id, "", "");
    
   
$quad->editar();
header("location:index.php");

//echo "entrou aqui  : ".$id;

}

    ?>
