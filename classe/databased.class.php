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

       // var_dump($parametros);
       try{
        return $stmt->execute();
       }catch (execption $e){
           throw new PDOException('erro:');
       }
    }

//salvar
    public static function buscar($stmt, $parametros=array()){

        $conexao = self::iniciaconexao();
        $stmt = $conexao->prepare($stmt);
        $stmt = self::vinculaparametros($stmt, $parametros);
        $stmt->execute();
        return $stmt->fetchAll();
       // var_dump($parametros);
       // return $stmt->execute();
    }

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