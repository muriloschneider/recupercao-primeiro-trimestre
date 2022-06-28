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

    public static function executacomando($sql, $parametros=array()){

        $conexao = self::iniciaconexao();
        $stmt = $conexao->prepare($sql);
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

     



}

?> 