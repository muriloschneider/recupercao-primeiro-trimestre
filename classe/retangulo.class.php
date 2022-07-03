<?php
include_once "../conf/default.inc.php";
require_once "../conf/Conexao.php";
require_once('forma.class.php');

class retangulo extends forma{

private $altura_retangulo;
private $base_retangulo;

public function __construct($id, $altura, $base, $cor, $idtabu) {

    //parent::__construct($id, $cor, $idtabu, $altura_retangulo, $base_retangulo);
    parent::__construct($id, $cor, $idtabu);
    $this->setaltura($altura);
    $this->setbase($base);
    

}

    public function getaltura(){  return $this->altura_retangulo; }
    public function getbase(){  return $this->base_retangulo; }

    public function setaltura($altura) { $this->altura_retangulo = $altura; }
    public function setbase($base) { $this->base_retangulo = $base; }

    public function __toString(){

        return  "<br> altura_retangulo: ".$this->getaltura().
        "<br> base_retangulo: ".$this->getbase().
        "<br> cor: ".$this->getcor().
        "<br> id tabuleiro: ".$this->getid().
        "<br> .....: ".$this->getidtabu();
        // "<br>   area: " .$this->calcular_area().
        // "<br> perimetro: " .$this->calcular_perimetro().
        // "<br> diagonal: " .$this->calcular_diagonal().
        // "<br> static: " .self::$contador;

    }


    public function inserir(){
        $ret = new retangulo($id_retangulo, $altura_retangulo, $base_retangulo, $cor, $idtabu);

        $sql = 'INSERT INTO retangulo (altura_retangulo, base_retangulo, cor, tabuleiro_id_tabuleiro) 
        VALUES(:altura_retangulo, :base_retangulo, :cor, :tabuleiro_id_tabuleiro)';
        $parametros = array(":altura_retangulo"=>$this->getaltura(), 
                            ":base_retangulo"=>$this->getbase(), 
                            ":cor"=>$this->getcor(),
                            ":tabuleiro_id_tabuleiro"=>$this->getidtabu());
        return parent::executaComando($sql,$parametros);
         
    }

    public function excluir(){
        $sql = 'DELETE FROM retangulo WHERE id_retangulo = :id_retangulo';
        $parametros = array(":id_retangulo"=>$this->getid());
        return parent::executaComando($sql,$parametros);
    }

    public function editar(){
        $sql = 'UPDATE retangulo 
        SET altura_retangulo = :altura_retangulo, base_retangulo = :base_retangulo, cor = :cor
        WHERE id_retangulo = :id_retangulo';
        $parametros = array(":altura_retangulo"=>$this->getaltura(),
                            ":base_retangulo"=>$this->getbase(),
                            ":cor"=>$this->getcor(),
                            ":id"=>$this->getid());
        return parent::executaComando($sql,$parametros);
    }

    public static function listar($tipo = 0, $procurar = ""){
        
        if($tipo==""){
            $sql = ("SELECT * FROM retangulo 
                                     WHERE id_retangulo LIKE '$procurar%'
                                     ORDER BY id_retangulo");
        }
        
         else if($tipo =="1"){
            $sql = ("SELECT * FROM retangulo 
                                     WHERE id_retangulo LIKE '$procurar%'
                                     ORDER BY id_retangulo");
        }
        
         else if($tipo =="2"){
            $sql = ("SELECT * FROM retangulo 
                                     WHERE altura_retangulo LIKE '$procurar%' 
                                     ORDER BY altura_retangulo");
        }
        
        else if($tipo =="3"){
            $sql = ("SELECT * FROM retangulo 
                                     WHERE cor LIKE '$procurar%' 
                                     ORDER BY cor");
        }
        else if($tipo =="4"){
            $sql = ("SELECT * FROM retangulo 
                                     WHERE base_retangulo LIKE '$procurar%' 
                                     ORDER BY base_retangulo");
        }
        else if($tipo =="5"){
            $sql = ("SELECT * FROM retangulo 
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

    public function desenha(){
        $str = "<div style='width: ".$this->getbase()."vw; height: ".$this->getaltura()."vw; 
        background: ".$this->getcor().";border: 1px solid".$this->getcor().";'></div><br>";
        return $str;
    }


    // public function __toString(){
    //    $str = parent::__toString();
    //    $str .= "<br>Altura_retangulo:".$this->getAlt()."<br>".
    //    "Base_retangulo:".$this->getBase_retangulo();
    //    return $str;
    // }

    public function Area() {
        $area = $this->base * $this->altura;
        return $area;
    }

}
?>