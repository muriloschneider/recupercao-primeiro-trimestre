<?php

include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
require_once "../classe/forma.class.php";

    class Cubo extends Quadrado{
        private $id_cubo;

    public function __construct($id_cubo, $lado, $cor) {
        parent::__construct($id, $lado, $cor, '');
        $this->setid_cubo($id_cubo);
        $this->setcor($cor);
    }

    public function getid_cubo(){ return $this->id_cubo; }
    public function getcor() { return $this->cor;}

    public function setid_cubo($id_cubo){ $this->id_cubo = $id_cubo;}
    public function setcor($cor) { $this->cor = $cor;}
        
    public function insere(){
        $sql = 'INSERT INTO cubo (cor, idquad) 
        VALUES(:cor, :idquad)';
        $parametros = array(":cor"=> $this->getCor(),
                ":idquad"=> $this->getId());

    return parent::executaComando($sql, $parametros); 
    }

    public function editar(){
        $sql = 'UPDATE cubo SET cor = :cor, idquad = :idquad WHERE id_cubo = :id_cubo';
        $parametros = array(":cor"=> $this->getCor(),
                        ":idquad"=> $this->getId(),
                        ":id_cubo"=> $this->getId_cubo());

            return parent::executaComando($sql, $parametros); 
        }

    public function excluir(){
        $sql ='DELETE FROM cubo WHERE id_cubo = :id_cubo';
        $parametros = array(":id_cubo" => $this->getId_cubo());

            return parent::executaComando($sql, $parametros); 
        }

    public static function listar($tipo = 0, $procurar = ""){
        
        if($tipo==""){
            $sql = ("SELECT * FROM cubo");
        }
            
        else if($tipo =="1"){
            $sql = ("SELECT * FROM cubo 
                        WHERE id_cubo = '$procurar%'
                            ORDER BY id_cubo");
            }
            
        else if($tipo =="2"){
            $sql = ("SELECT * FROM cubo 
                            WHERE cor LIKE '$procurar%' 
                            ORDER BY cor");
            }
        else if($tipo =="3"){
            $sql = ("SELECT * FROM cubo 
                        WHERE quadrado_id LIKE '$procurar%' 
                        ORDER BY quadrado_id");
            }
        }
        public function divide(){
            return $this->getLado() / 2;
        }

    public function desenha(){
        $desenha = "<div style='width: ".$this->getlado()."vh; height: ".$this->getlado()."vh; animation: rotate 10s infinite alternate; transform-style: preserve-3d;'>
                        <div style='background: linear-gradient(45deg, ".$this->getcor().", ".$this->getcor()."); border: 2px solid white; display: flex; width: ".$this->getlado()."vh; height: ".$this->getLado()."vh; 
                            position: absolute; transform: translateZ(".$this->divide()."vh);'></div>
                        <div style='background: linear-gradient(45deg, ".$this->getcor().", ".$this->getcor()."); border: 2px solid white; display: flex; width: ".$this->getlado()."vh; height: ".$this->getlado()."vh; 
                            position: absolute; transform: rotateY(90deg) translateZ(".$this->divide()."vh);'></div>
                        <div style='background: linear-gradient(45deg, ".$this->getcor().", ".$this->getcor()."); border: 2px solid white; display: flex; width: ".$this->getlado()."vh; height: ".$this->getlado()."vh; 
                            position: absolute; transform: rotateY(180deg) translateZ(".$this->divide()."vh);'></div>
                        <div style='background: linear-gradient(45deg, ".$this->getcor().", ".$this->getcor()."); border: 2px solid white; display: flex; width: ".$this->getlado()."vh; height: ".$this->getlado()."vh; 
                            position: absolute; transform: rotateY(-90deg) translateZ(".$this->divide()."vh);'></div>
                        <div style='background: linear-gradient(45deg, ".$this->getcor().", ".$this->getcor()."); border: 2px solid white; display: flex; width: ".$this->getlado()."vh; height: ".$this->getlado()."vh; 
                            position: absolute; transform: rotateX(90deg) translateZ(".$this->divide()."vh);'></div>
                        <div style='background: linear-gradient(45deg, ".$this->getcor().", ".$this->getcor()."); border: 2px solid white; display: flex; width: ".$this->getlado()."vh; height: ".$this->getlado()."vh; 
                            position: absolute; transform: rotateX(-90deg) translateZ(".$this->divide()."vh);'></div>
                    </div><br><br><br>";
            return $desenha;
        }

    public function __toString() {
        return  "<br>id Quadrado: ".$this->getid().
                "<br>id Cubo: ".$this->getid_cubo().
                "<br>cor: ".$this->getcor().
                "<br>área: ".round($this->AreaC(),2)." m²".
                "<br>perímetro: ".round($this->perimetrocubo(),2).
                "<br>diagonal: ".round($this->diagonalcubo(),2).
                "<br>volume: ".round($this->volumecubo(),2);
        }

    public function areacubo() {
        $area = 6 * pow($this->getlado(),2);
        return $area;
    }

    public function perimetrocubo() {
        $perimetro = $this->getlado() * 12;
        return $perimetro;
    }

    public function diagonalcubo() {
        $diagonal = $this->getLado() * sqrt(3);
        return $diagonal;
    }

    public function volumecubo() {
        $vol = pow($this->getLado(),3);
        return $vol;
    }
}

?>