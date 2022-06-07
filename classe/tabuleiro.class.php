<?php
//tabuleiro
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";

    class tabuleiro{
        private $id_tabuleiro;
        private $lado_tabuleiro;
   
    
    
    public function __construct($idtabu, $ladotabu) {
        $this->setidtabu($idtabu);
        $this->setladotabu($ladotabu);
    }

   

    public function getidtabu(){  return $this->id_tabuleiro; }
    public function getladotabu(){  return $this->lado_tabuleiro; }
    
   

    public function setidtabu($idtabu) { $this->id_tabuleiro = $idtabu; }
    public function setladotabu($ladotabu) { $this->lado_tabuleiro = $ladotabu; }
    
    
    

   public function buscar($id_tabuleiro){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM tabuleiro WHERE id_tabuleiro= $id_tabuleiro");
        $dados = array();
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $dados['id_tabuleiro'] = $linha['id_tabuleiro'];
                $dados['lado_tabuleiro'] = $linha['lado_tabuleiro'];
            
        }
        //var_dump($dados);
        return $dados;
    }

    function excluir(){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('DELETE FROM tabuleiro WHERE id_tabuleiro = :id_tabuleiro');
        $stmt->bindParam(':id_tabuleiro', $this->getidtabu());
        
        return $stmt->execute();
    }
    public function editar(){
            
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare("UPDATE `tabuleiro` SET `lado_tabuleiro` = :lado_tabuleiro WHERE (`id_tabuleiro` = :id_tabuleiro);");
    
        $stmt->bindValue(':id_tabuleiro', $this->getidtabu(), PDO::PARAM_INT);
        $stmt->bindValue(':lado_tabuleiro', $this->getladotabu(), PDO::PARAM_STR);
        
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
        $stmt = $pdo->prepare('INSERT INTO tabuleiro ( id_tabuleiro, lado_tabuleiro) VALUES(:id_tabuleiro, :lado_tabuleiro)');
        $stmt->bindParam(':id_tabuleiro', $this->getidtabu(), PDO::PARAM_STR);
        $stmt->bindParam(':lado_tabuleiro', $this->getladotabu(), PDO::PARAM_STR);

        // $id_tabuleiro = $this->getidtabu();
        // $lado_tabuleiro = $this->getladotabu();
        
        return $stmt->execute();
        
    }




    public function listar($tipo = 0, $procurar = ""){
        
$resultado = "";
        $pdo = Conexao::getInstance();
        if($tipo==""){
            $resultado = $pdo->query("SELECT * FROM tabuleiro 
                                     WHERE id_tabuleiro LIKE '$procurar%'
                                     ORDER BY id_tabuleiro");
        }
        
         else if($tipo =="1"){
            $resultado = $pdo->query("SELECT * FROM tabuleiro 
                                     WHERE id_tabuleiro LIKE '$procurar%'
                                     ORDER BY id_tabuleiro");
        }
        
         else if($tipo =="2"){
            $resultado = $pdo->query("SELECT * FROM tabuleiro 
                                     WHERE lado_tabuleiro LIKE '$procurar%' 
                                     ORDER BY lado_tabuleiro");
        }
        

//var_dump($tipo);
        return $resultado;

    }

}

?>
