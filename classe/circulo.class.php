<?php
//circulo
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
require_once "../classe/forma.class.php";

class circulo extends forma{
    
    private $raio_circulo;

    
    public function __construct($id_circulo, $raio_circulo, $cor, $idtabu) {

        parent::__construct($id_circulo, $cor, $idtabu);
        $this->setraio($raio_circulo);
       
    }

    public function getraio(){  return $this->raio_circulo; }
   
    public function setraio($raio) { $this->raio_circulo = $raio; }
    
    function excluir(){

        $sql = 'DELETE FROM circulo WHERE id_circulo = :id_circulo';

        $parametros = array(":id_circulo"=>$this->getid());
                   

            return parent::executacomando($sql, $parametros);
    }

    public function editar(){

        $sql = "UPDATE circulo
        SET raio_circulo = :raio_circulo, cor = :cor, tabuleiro_id_tabuleiro = :tabuleiro_id_tabuleiro
        WHERE id_circulo = :id_circulo";

        $par = array(' :raio_circulo'=>$this->getraio() ,
              ':cor'=>$this->getcor() ,
              ':id_circulo'=>$this->getid() ,
              ':tabuleiro_id_tabuleiro'=>$this->getidtabu() );

        return parent::executacomando($sql, $par);
    }

    public function __toString(){

        return  "<br> raio: ".$this->getraio().
        "<br> cor: ".$this->getcor().
        "<br> id tabuleiro: ".$this->getidtabu().
        "<br>circunferência: ".round($this->circunferencia(),2).
        "<br>diâmetro: ".round($this->diametro(),2);
      

    }

    public function inserir(){
        $circ = new circulo($id_circulo, $raio_circulo, $cor, $idtabu);

        $sql = 'INSERT INTO circulo (raio_circulo, cor, tabuleiro_id_tabuleiro) VALUES(:raio_circulo, :cor, :tabuleiro_id_tabuleiro)';

        $parametros = array(":raio_circulo"=>$this->getraio() ,
                    ":cor"=>$this->getcor() ,
                    ":tabuleiro_id_tabuleiro"=>$this->getidtabu());

                return parent::executacomando($sql, $parametros);
        
    }

    public static function listar($tipo = 0, $procurar = ""){
        
        if($tipo==""){
            $sql = ("SELECT * FROM circulo");
        }
        
         else if($tipo =="1"){
            $sql = ("SELECT * FROM circulo 
                                     WHERE id_circulo = '$procurar%'
                                     ORDER BY id_circulo");
        }
        
         else if($tipo =="2"){
            $sql = ("SELECT * FROM circulo 
                                     WHERE raio_circulo LIKE '$procurar%' 
                                     ORDER BY raio_circulo");
        }
        
        else if($tipo =="3"){
            $sql = ("SELECT * FROM circulo 
                                     WHERE cor LIKE '$procurar%' 
                                     ORDER BY cor");
        }
        else if($tipo =="4"){
            $sql = ("SELECT * FROM circulo 
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
    public function circunferencia() {
        $circ = 2 * pi() * $this->raio_circulo;
    return $circ;
}

    public function diametro() {
        $di = 2 * $this->raio_circulo;
    return $di;
}

    public function desenha(){
        $str = "<div  width: ".$this->Diametro()."vw; height: ".$this->Diametro().
        "vw; background: ".$this->getcor().";border: 10px ".$this->getcor().";'></div><br>";
    return $str;
}

}

?>
