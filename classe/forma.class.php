<?php

class forma{
    private $id;
    private $cor;
    private $tabuleiro;
    private static $contador = 0;
    
    public function __construct($id, $cor, $tab) {
        $this->setId($id);
        $this->setCor($cor);
        $this->setTabuleiro($tab);
        self::$contador = self::$contador + 1;
    }

   

    public function getid(){  return $this->id; }
    public function getlado(){  return $this->lado; }
    public function getcor(){  return $this->cor; }
    public function getidtabu(){  return $this->tabuleiro_id_tabuleiro; }
   

    public function setid($id) { $this->id = $id; }
    public function setlado($lado) { $this->lado = $lado; }
    public function setcor($cor) { $this->cor = $cor; }
    public function setidtabu($idtabu) { $this->tabuleiro_id_tabuleiro = $idtabu; }

    public function calcular_area(){

        $area = $this->lado * $this->lado;
        return $area;

}

    public function calcular_diagonal(){

        $diagonal = $this->lado * 1.44;
    
        return $diagonal;

}

}
    ?>