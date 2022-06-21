<?php
//quadrado
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
require_once "../classe/forma.class.php";

class quadrado extends forma{
    //private $id;
    private $lado;
    // private $cor;
    // private $tabuleiro_id_tabuleiro;
   // private static $contador = 0;
    
    public function __construct($id, $lado, $cor, $idtabu) {
       // $this->setId($id);
       parent::__construct($id, $cor, $idtabu);
        $this->setLado($lado);
       // $this->setCor($cor);
       // $this->setIdTabu($idtabu);
       // self::$contador = self::$contador + 1;
    }

   

    // public function getid(){  return $this->id; }
    public function getlado(){  return $this->lado; }
    // public function getcor(){  return $this->cor; }
    // public function getidtabu(){  return $this->tabuleiro_id_tabuleiro; }
   

    // public function setid($id) { $this->id = $id; }
    public function setlado($lado) { $this->lado = $lado; }
    // public function setcor($cor) { $this->cor = $cor; }
    // public function setidtabu($idtabu) { $this->tabuleiro_id_tabuleiro = $idtabu; }
    
    

//    public function buscar($id){
//         $pdo = Conexao::getInstance();
//         $consulta = $pdo->query("SELECT * FROM quadrado WHERE id= $id");
//         $dados = array();
//             while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
//                 $dados['id'] = $linha['id'];
//                 $dados['lado'] = $linha['lado'];
//                 $dados['cor'] = $linha['cor'];
//                 $dados['tabuleiro_id_tabuleiro'] = $linha['tabuleiro_id_tabuleiro'];
//                 }
//         //var_dump($dados);
//         return $dados;
//     }

    // function excluir(){
    //     $pdo = Conexao::getInstance();
    //     $stmt = $pdo ->prepare('DELETE FROM quadrado WHERE id = :id');
    //     $stmt->bindParam(':id', $this->id);
        
    //     return $stmt->execute();
    // }
    public function editar(){
            
        // $pdo = Conexao::getInstance();
        // $stmt = $pdo->prepare("UPDATE `quadrado` SET `lado` = :lado, `cor` = :cor, `tabuleiro_id_tabuleiro` = :tabuleiro_id_tabuleiro WHERE (`id` = :id);");
    
        // $stmt->bindValue(':id', $this->getId(), PDO::PARAM_INT);
        // $stmt->bindValue(':lado', $this->getLado(), PDO::PARAM_STR);
        // $stmt->bindValue(':cor', $this->getCor(), PDO::PARAM_STR);
        // $stmt->bindValue(':tabuleiro_id_tabuleiro', $this->getidtabu(), PDO::PARAM_STR);

$sql = "UPDATE quadrado
        SET lado = :lado, cor = :cor, tabuleiro_id_tabuleiro = :idtabu
        WHERE id = :id";

$par = array(' :lado'=>$this->getlado() ,
              ':cor'=>$this->getcor() ,
              ':id'=>$this->getid() ,
              ':tabuleiro_id_tabuleiro'=>$this->getidtabu() );

        return parent::executacomando($sql, $par);
    }

    public function __toString(){

        return  "<br> lado: ".$this->getlado();
        // "<br> cor: ".$this->getcor().
        // "<br> id tabuleiro: ".$this->getidtabu().
        // "<br>   area: " .$this->calcular_area().
        // "<br> perimetro: " .$this->calcular_perimetro().
        // "<br> diagonal: " .$this->calcular_diagonal().
        // "<br> static: " .self::$contador;

    }

    public function inserir(){
        

    //    echo $lado; echo $cor; echo $tabuleiro_id_tabuleiro;

    //     $pdo = Conexao::getInstance();

        $sql = 'INSERT INTO quadrado (lado, cor, tabuleiro_id_tabuleiro) VALUES(:lado, :cor, :tabuleiro_id_tabuleiro)';

        $parametros = array(":lado"=>$this->getlado() ,
                    ":cor"=>$this->getcor() ,
                    ":tabuleiro_id_tabuleiro"=>$this->getidtabu());

                return parent::executacomando($sql, $parametros);
        // $stmt->bindParam(':lado', $lado, PDO::PARAM_STR);
        // $stmt->bindParam(':cor', $cor, PDO::PARAM_STR);
        // $stmt->bindParam(':tabuleiro_id_tabuleiro', $tabuleiro_id_tabuleiro, PDO::PARAM_STR);

        // $lado = $this->getlado();
        // $cor = $this->getcor(); 
        // $tabuleiro_id_tabuleiro = $this->getidtabu(); 
        //return $sql->execute();



       // $stmt->debugDumpparams();
        
    }


    public function calcular_area(){

        $area = $this->lado * $this->lado;
        return $area;

}

    public function calcular_perimetro(){
        $perimetro = $this->lado * 4;
        return $perimetro;

}

    public function calcular_diagonal(){

        $diagonal = $this->lado * 1.44;
    
        return $diagonal;

}

    public static function listar($tipo = 0, $procurar = ""){
        
        if($tipo==""){
            $sql = ("SELECT * FROM quadrado 
                                     WHERE id LIKE '$procurar%'
                                     ORDER BY id");
        }
        
         else if($tipo =="1"){
            $sql = ("SELECT * FROM quadrado 
                                     WHERE id LIKE '$procurar%'
                                     ORDER BY id");
        }
        
         else if($tipo =="2"){
            $sql = ("SELECT * FROM quadrado 
                                     WHERE lado LIKE '$procurar%' 
                                     ORDER BY lado");
        }
        
        else if($tipo =="3"){
            $sql = ("SELECT * FROM quadrado 
                                     WHERE cor LIKE '$procurar%' 
                                     ORDER BY cor");
        }
        else if($tipo =="4"){
            $sql = ("SELECT * FROM quadrado 
                                     WHERE tabuleiro_id_tabuleiro LIKE '$procurar%' 
                                     ORDER BY tabuleiro_id_tabuleiro");
        }
        
if ($tipo > 0)
$par = array(':procurar'=>$procurar);
else
$par = array();
return parent::buscar($sql, $par);

//var_dump($tipo);
return $tipo;

}
}

?>
