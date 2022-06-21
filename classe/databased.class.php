<?php

include_once "../conf/default.inc.php";
require_once "../conf/Conexao.php";

class databased{

    public static function iniciaconexao(){

        require_once "../conf/Conexao.php";

        return Conexao::getInstance();

    }

    public static function vinculaparametros($stmt, $parametros=array()){

        foreach($parametros as $chave=>$valor){
$stmt->bindValue($chave, $valor);
        }
        return $stmt;
    }

    public static function executacomando($stmt, $parametros=array()){

        $conexao = self::iniciaconexao();
        $stmt = $conexao->prepare($stmt);
        $stmt = self::vinculaparametros($stmt, $parametros);

        var_dump($parametros);
        return $stmt->execute();
    }

    // function excluir($sql, $parametros=array()){
    //     //$pdo = Conexao::getInstance();

    //     $conexao = self::iniciaconexao();
    //     $stmt = $conexao->prepare($sql);
    //     $stmt = self::vinculaparametros($stmt, $parametros);

    //     // $stmt = $pdo ->prepare('DELETE FROM quadrado WHERE id = :id');
    //     // $stmt->bindParam(':id', $this->id);
        
    //     return $stmt->execute();
    // }
    // public function editar(){
            
    //     $pdo = Conexao::getInstance();
    //     $stmt = $pdo->prepare("UPDATE `quadrado` SET `lado` = :lado, `cor` = :cor, `tabuleiro_id_tabuleiro` = :tabuleiro_id_tabuleiro WHERE (`id` = :id);");
    
    //     $stmt->bindValue(':id', $this->getId(), PDO::PARAM_INT);
    //     $stmt->bindValue(':lado', $this->getLado(), PDO::PARAM_STR);
    //     $stmt->bindValue(':cor', $this->getCor(), PDO::PARAM_STR);
    //     $stmt->bindValue(':tabuleiro_id_tabuleiro', $this->getidtabu(), PDO::PARAM_STR);

    //     return $stmt->execute();
    // }

    // public static function inserir($sql, $parametros=array()){
        
    //     $conexao = self::iniciaconexao();
    //     $stmt = $conexao->prepare($sql);
    //     $stmt = self::vinculaparametros($stmt, $parametros);

        //echo $lado; echo $cor; echo $tabuleiro_id_tabuleiro;
 
        //  $pdo = Conexao::getInstance();
        //  $stmt = $pdo->prepare('INSERT INTO quadrado (lado, cor, tabuleiro_id_tabuleiro) VALUES(:lado, :cor, :tabuleiro_id_tabuleiro)');
        //  $stmt->bindParam(':lado', $lado, PDO::PARAM_STR);
        //  $stmt->bindParam(':cor', $cor, PDO::PARAM_STR);
        //  $stmt->bindParam(':tabuleiro_id_tabuleiro', $tabuleiro_id_tabuleiro, PDO::PARAM_STR);
 
         // $lado = $this->getlado();
         // $cor = $this->getcor(); 
         // $tabuleiro_id_tabuleiro = $this->getidtabu(); 
        // return $stmt->execute();
 
 
 
        // $stmt->debugDumpparams();
         
     //}

     public static function listar($sql, $parametros =array()){

       //$stmt = self::executacomando()

      // return $stmt->fetchAll();


        
        
    //     $pdo = Conexao::getInstance();
    //         if($tipo==""){
    //             $tipo = $pdo->query("SELECT * FROM quadrado 
    //                                      WHERE id LIKE '$procurar%'
    //                                      ORDER BY id");
    //         }
            
    //          else if($tipo =="1"){
    //             $tipo = $pdo->query("SELECT * FROM quadrado 
    //                                      WHERE id LIKE '$procurar%'
    //                                      ORDER BY id");
    //         }
            
    //          else if($tipo =="2"){
    //             $tipo = $pdo->query("SELECT * FROM quadrado 
    //                                      WHERE lado LIKE '$procurar%' 
    //                                      ORDER BY lado");
    //         }
            
    //         else if($tipo =="3"){
    //             $tipo = $pdo->query("SELECT * FROM quadrado 
    //                                      WHERE cor LIKE '$procurar%' 
    //                                      ORDER BY cor");
    //         }
    //         else if($tipo =="4"){
    //             $tipo = $pdo->query("SELECT * FROM quadrado 
    //                                      WHERE tabuleiro_id_tabuleiro LIKE '$procurar%' 
    //                                      ORDER BY tabuleiro_id_tabuleiro");
    //         }
            
    
    // //var_dump($tipo);
    // return $tipo;
    
    }







}

?> 