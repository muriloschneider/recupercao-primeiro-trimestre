<?php
include_once "../conf/default.inc.php";
require_once "../conf/Conexao.php";
require_once('forma.class.php');

class triangulo extends forma{

private $ladoum;
private $ladodois;
private $base_triangulo;


public function __construct($id, $ladoum, $ladodois, $cor, $idtabu, $base_triangulo) {

    //parent::__construct($id, $cor, $idtabu, $altura_retangulo, $base_retangulo);
    parent::__construct($id, $cor, $idtabu);
    $this->setladoum($ladoum);
    $this->setladodois($ladodois);
    $this->setbase($base_triangulo);

    

}

    public function getladoum(){  return $this->ladoum; }
    public function getladodois(){  return $this->ladodois; }
    public function getbase(){  return $this->base_triangulo; }


    public function setladoum($ladoum) { $this->ladoum = $ladoum; }
    public function setladodois($ladodois) { $this->ladodois = $ladodois; }
    public function setbase($base) { $this->base_triangulo = $base; }


    public function __toString(){

        return  "<br> lado um: ".$this->getladoum().
        "<br> lado dois: ".$this->getladodois().
        "<br> base: ".$this->getbase().
        "<br> cor: ".$this->getcor().
        "<br> id tabuleiro: ".$this->getid().
        "<br> .....: ".$this->getidtabu();
        // "<br>   area: " .$this->calcular_area().
        // "<br> perimetro: " .$this->calcular_perimetro().
        // "<br> diagonal: " .$this->calcular_diagonal().
        // "<br> static: " .self::$contador;

    }


    public function inserir(){
        $tri = new triangulo($id_triangulo, $ladoum, $ladodois, $cor, $idtabu, $base_triangulo);

        $sql = 'INSERT INTO triangulo (ladoum, ladodois, cor, tabuleiro_id_tabuleiro, base_triangulo) 
        VALUES(:ladoum, :ladodois, :cor, :tabuleiro_id_tabuleiro, :base_triangulo)';
        $parametros = array(":ladoum"=>$this->getladoum(), 
                            ":ladodois"=>$this->getladodois(), 
                            ":cor"=>$this->getcor(),
                            ":tabuleiro_id_tabuleiro"=>$this->getidtabu(),
                            ":base_triangulo"=>$this->getbase());
        return parent::executaComando($sql,$parametros);
         
    }

    public function excluir(){
        $sql = 'DELETE FROM triangulo WHERE id_triangulo = :id_triangulo';
        $parametros = array(":id_triangulo"=>$this->getid());
        return parent::executaComando($sql,$parametros);
    }

    public function editar(){
        $sql = 'UPDATE triangulo 
        SET ladoum = :ladoum, ladodois = :ladodois, cor = :cor, tabuleiro_id_tabuleiro = :tabuleiro_id_tabuleiro, base_triangulo = :base_triangulo
        WHERE id_triangulo = :id_triangulo';
        $parametros = array(":id_triangulo"=>$this->getid(),
                            ":ladoum"=>$this->getladoum(),
                            ":ladodois"=>$this->getladodois(),
                            ":cor"=>$this->getcor(),
                            ":tabuleiro_id_tabuleiro"=>$this->getidtabu());

        return parent::executaComando($sql,$parametros);
    }

    public static function listar($tipo = 0, $procurar = ""){
        
        if($tipo==""){
            $sql = ("SELECT * FROM triangulo 
                                     WHERE id_triangulo LIKE '$procurar%'
                                     ORDER BY id_triangulo");
        }
        
         else if($tipo =="1"){
            $sql = ("SELECT * FROM triangulo 
                                     WHERE id_triangulo LIKE '$procurar%'
                                     ORDER BY id_triangulo");
        }
        
         else if($tipo =="2"){
            $sql = ("SELECT * FROM triangulo 
                                     WHERE ladoum LIKE '$procurar%' 
                                     ORDER BY ladoum");
        }
        
        else if($tipo =="3"){
            $sql = ("SELECT * FROM triangulo 
                                     WHERE ladodois LIKE '$procurar%' 
                                     ORDER BY ladodois");
        }
        else if($tipo =="4"){
            $sql = ("SELECT * FROM triangulo 
                                     WHERE cor LIKE '$procurar%' 
                                     ORDER BY cor");
        }
        else if($tipo =="5"){
            $sql = ("SELECT * FROM triangulo 
                                     WHERE tabuleiro_id_tabuleiro LIKE '$procurar%' 
                                     ORDER BY tabuleiro_id_tabuleiro");
        }
        else if($tipo =="6"){
            $sql = ("SELECT * FROM triangulo 
                                     WHERE base_triangulo LIKE '$procurar%' 
                                     ORDER BY base_triangulo");
        }
        
if ($tipo > 0)
$par = array(':procurar'=>$procurar);
else
$par = array();
return parent::buscar($sql, $par);

//var_dump($tipo);
return $tipo;

}

// public function __toString(){
//     //$str = parent::__toString();
//     $str .= "<br>Base:".$this->getbase().
//     "<br>Lado um:".$this->getladoum().
//     "<br>Lado dois:".$this->getladodois().
//     "<br>Área: ".round($this->Area(),2).
//     "<br>Classificação:".$this->Tipo();
//     return $str;
//  }

    
    public function desenha(){
        $str = "<div  style='width: 0px; height: 0px; transition: transform 1s; transform: translateX(0) scale(0.5);
        border-left: ".$this->ladoum."vw solid transparent; border-right: "
        .$this->ladodois."vw solid transparent; border-bottom: ".$this->base_triangulo."vw solid ".parent::getcor().";'></div><br>";
        return $str;
    }

    public function Tipo(){
        if ($this->getbase() == $this->getladoum() && $this->getladoum() == $this->getladodois()) {
            return "Equilátero";
        }
        elseif ($this->getbase() != $this->getladoum() && $this->getbase() != $this->getladodois() 
        && $this->getladoum() != $this->getladodois()) {
            return "Escaleno";
        }
        else{
            return "Isóceles";
        }
    }
    public function Area() {
        $area = sqrt(($this->base+$this->ladoum+$this->ladodois)*(-$this->base+$this->ladoum+$this->ladodois)*($this->base-$this->ladoum+$this->ladodois)
        *($this->base+$this->ladoum-$this->ladodois))/4;
        return $area;
    }
}
?>