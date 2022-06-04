<?php
//tabuleiro
include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";

class tabuleiro{
    private $id_tabuleiro;
    private $lado_tabuleiro;
   
    
    
    public function __construct($idtabu, $ladotabu) {
        $this->setIdtabu($idtabu);
        $this->setLadotabu($ladotabu);
    }

   

    public function getidtabu(){  return $this->id_tabuleiro; }
    public function getladotabu(){  return $this->lado_tabuleiro; }
    
   

    public function setidtabu($idtabu) { $this->id_tabuleiro = $idtabu; }
    public function settabu($tabu) { $this->lado_tabuleiro = $ladotabu; }
    
    
    

   public function buscar($id_tabuleiro){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM tabuleiro WHERE id_tabuleiro= $id_tabuleiro");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['id_tabuleiro'] = $linha['id_tabuleiro'];
            $dados['lado'] = $linha['lado'];
            
        }
        //var_dump($dados);
        return $dados;
    }

    function excluir(){
        $pdo = Conexao::getInstance();
        $stmt = $pdo ->prepare('DELETE FROM tabuleiro WHERE id_tabuleiro = :id_tabuleiro');
        $stmt->bindParam(':id_tabuleiro', $this->id_tabuleiro);
        
        return $stmt->execute();
    }
    public function editar(){
            
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare("UPDATE `tabuleiro` SET `lado_tabuleiro` = :lado_tabuleiro, `cor` = :cor, `tabuleiro_id_tabuleiro` = :tabuleiro_id_tabuleiro WHERE (`id` = :id);");
    
        $stmt->bindValue(':id_tabuleiro', $this->getIdtabu(), PDO::PARAM_INT);
        $stmt->bindValue(':lado_tabuleiro', $this->getLadotabu(), PDO::PARAM_STR);
        
        return $stmt->execute();

       
        
    }

    public function __toString(){

        return  "<br> lado tabuleiro: ".$this->getladotabu().
        "<br> id tabuleiro: ".$this->getidtabu().
        "<br>   area: " .$this->calcular_area().
        "<br> perimetro: " .$this->calcular_perimetro();
        
        
    }

    public function inserir(){
        
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('INSERT INTO tabuleiro (lado_tabuleiro) VALUES(:lado_tabuleiro)');
        $stmt->bindParam(':lado_tabuleiro', $lado_tabuleiro, PDO::PARAM_STR);
        
        $lado_tabuleiro = $this->getladotabu();
        return $stmt->execute();
        
    }


    public function calcular_area(){

          $area = $this->lado * $this->lado;

          return $area;

//ou   return $this->lado() * 4;

}

public function calcular_perimetro(){

          $perimetro = $this->lado * 4;

          return $perimetro;

}

    public function listar($tipo = 0, $procurar = ""){
        

        $pdo = Conexao::getInstance();
        if($tipo==""){
            $tipo = $pdo->query("SELECT * FROM tabuleiro 
                                     WHERE id_tabuleiro LIKE '$procurar%'
                                     ORDER BY id_tabuleiro");
        }
        
         else if($tipo =="1"){
            $tipo = $pdo->query("SELECT * FROM tabuleiro 
                                     WHERE id_tabuleiro LIKE '$procurar%'
                                     ORDER BY id_tabuleiro");
        }
        
         else if($tipo =="2"){
            $tipo = $pdo->query("SELECT * FROM tabuleiro 
                                     WHERE lado_tabuleiro LIKE '$procurar%' 
                                     ORDER BY lado_tabuleiro");
        }
        

//var_dump($tipo);
return $tipo;

        // $stmt = $pdo->prepare($query);
        // $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        // $stmt->bindParam(':lado', $lado, PDO::PARAM_STR);
        // $stmt->bindParam(':cor', $cor, PDO::PARAM_STR);

    //     if ($stmt->execute())
    //     return $stmt->fetchAll();
    
    // return false; 

}

}

?>
