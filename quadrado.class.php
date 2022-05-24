<?php
//quadrado
include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

class quadrado{
    private $id;
    private $lado;
    private $cor;
    
    


    public function __construct($id,$lado,$cor){
        $this->id = $id;
        $this->lado = $lado;
        $this->cor = $cor;
        
       
    }

    public function getid(){  return $this->id; }
    public function getlado(){  return $this->lado; }
    public function getcor(){  return $this->cor; }
  
   

    public function setid($id) { $this->id = $id; }
    public function setlado($lado) { $this->lado = $lado; }
    public function setcor($cor) { $this->cor = $cor; }
    
    
    

    public function buscar($id){

        require_once("conexao.php");
        $query .= 'SELECT * FROM quadrado';
        $conexao = Conexao::getInstance();
        if($id > 0){
            $query = $query . ' WHERE id = :id';
            $stmt->bindParam(':id',$id);
        }

        $stmt = $conexao->prepare($query);
        if ($stmt->execute())
            return $stmt->fetchAll();
        
        return false; 
    }

    function excluir(){
        $pdo = Conexao::getInstance();
        $stmt = $pdo ->prepare('DELETE FROM quadrado WHERE id = :id');
        $stmt->bindParam(':id', $this->id);
        
        return $stmt->execute();
    }
    public function editar(){
            
        $pdo = Conexao::getInstance();
    $stmt = $pdo->prepare('UPDATE quadrado SET id = :id WHERE id = :id');
    //$stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':id', $this->id, PDO::PARAM_STR);
    



        return $stmt->execute();
        
    }

    public function __toString(){

        return  "<br> lado: ".$this->getlado().
        "<br> cor: ".$this->getcor().
        "<br>   area: " .$this->calcular_area().
        "<br> perimetro: " .$this->calcular_perimetro().
        "<br> diagonal: " .$this->calcular_diagonal();
        
    }

    public function inserir(){
        
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('INSERT INTO quadrado (lado, cor) VALUES(:lado, :cor)');
        $stmt->bindParam(':lado', $lado, PDO::PARAM_STR);
        $stmt->bindParam(':cor', $cor, PDO::PARAM_STR);

        $lado = $this->getlado();
        $cor = $this->getcor(); 

        return $stmt->execute();
        
    }


    public function calcular_area(){

          $area = $this->lado * $this->lado;

          return $area;

//ou   return $this->lado * $this->lado;

}

public function calcular_perimetro(){

          $perimetro = $this->lado * 4;

          return $perimetro;

}

public function calcular_diagonal(){

    $diagonal = $this->lado * 1.44;
    
    return $diagonal;

    }


}

?>
