<?php
//quadrado
include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

class quadrado{
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
    
    
    

   public function buscar($id){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM quadrado WHERE id= $id");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['id'] = $linha['id'];
            $dados['lado'] = $linha['lado'];
            $dados['cor'] = $linha['cor'];
            $dados['tabuleiro_id_tabuleiro'] = $linha['tabuleiro_id_tabuleiro'];
        }
        //var_dump($dados);
        return $dados;
    }

    function excluir(){
        $pdo = Conexao::getInstance();
        $stmt = $pdo ->prepare('DELETE FROM quadrado WHERE id = :id');
        $stmt->bindParam(':id', $this->id);
        
        return $stmt->execute();
    }
    public function editar(){
            
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare("UPDATE `quadrado` SET `lado` = :lado, `cor` = :cor, `tabuleiro_id_tabuleiro` = :tabuleiro_id_tabuleiro WHERE (`id` = :id);");
    
        $stmt->bindValue(':id', $this->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':lado', $this->getLado(), PDO::PARAM_STR);
        $stmt->bindValue(':cor', $this->getCor(), PDO::PARAM_STR);
        $stmt->bindValue(':tabuleiro_id_tabuleiro', $this->getidtabu(), PDO::PARAM_STR);

        return $stmt->execute();

       
        
    }

    public function __toString(){

        return  "<br> lado: ".$this->getlado().
        "<br> cor: ".$this->getcor().
        "<br> id tabuleiro: ".$this->getidtabu().
        "<br>   area: " .$this->calcular_area().
        "<br> perimetro: " .$this->calcular_perimetro().
        "<br> diagonal: " .$this->calcular_diagonal();
        
    }

    public function inserir(){
        
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('INSERT INTO quadrado (lado, cor, tabuleiro_id_tabuleiro) VALUES(:lado, :cor, :tabuleiro_id_tabuleiro)');
        $stmt->bindParam(':lado', $lado, PDO::PARAM_STR);
        $stmt->bindParam(':cor', $cor, PDO::PARAM_STR);
        $stmt->bindParam(':tabuleiro_id_tabuleiro', $tabuleiro_id_tabuleiro, PDO::PARAM_STR);

        $lado = $this->getlado();
        $cor = $this->getcor(); 
        $tabuleiro_id_tabuleiro = $this->getidtabu(); 
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

public function calcular_diagonal(){

    $diagonal = $this->lado * 1.44;
    
    return $diagonal;

}

    public function listar($tipo = 0, $procurar = ""){
        

        $pdo = Conexao::getInstance();
        if($tipo==""){
            $tipo = $pdo->query("SELECT * FROM quadrado 
                                     WHERE id LIKE '$procurar%'
                                     ORDER BY id");
        }
        
         else if($tipo =="1"){
            $tipo = $pdo->query("SELECT * FROM quadrado 
                                     WHERE id LIKE '$procurar%'
                                     ORDER BY id");
        }
        
         else if($tipo =="2"){
            $tipo = $pdo->query("SELECT * FROM quadrado 
                                     WHERE lado LIKE '$procurar%' 
                                     ORDER BY lado");
        }
        
        
        
        else if($tipo =="3"){
            $tipo = $pdo->query("SELECT * FROM quadrado 
                                     WHERE cor LIKE '$procurar%' 
                                     ORDER BY cor");
        }
        else if($tipo =="4"){
            $tipo = $pdo->query("SELECT * FROM quadrado 
                                     WHERE tabuleiro_id_tabuleiro LIKE '$procurar%' 
                                     ORDER BY tabuleiro_id_tabuleiro");
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
