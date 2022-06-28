<?php

 include_once "../conf/default.inc.php";
 require_once "../conf/Conexao.php";
 require_once "../classe/databased.class.php";


abstract class forma extends databased{
    private $id;
    private $cor;
    private $tabuleiro_id_tabuleiro;
    //private static $contador = 0;
    
    public function __construct($id, $cor, $idtabu) {
        $this->setid($id);
        $this->setcor($cor);
        $this->setidtabu($idtabu);
       // self::$contador = self::$contador + 1;
    }

   

    public function getid(){  return $this->id; }
    public function getlado(){  return $this->lado; }
    public function getcor(){  return $this->cor; }
    public function getidtabu(){  return $this->tabuleiro_id_tabuleiro; }
   

    public function setid($id) { $this->id = $id; }
    public function setlado($lado) { $this->lado = $lado; }
    public function setcor($cor) { $this->cor = $cor; }
    public function setidtabu($idtabu) { $this->tabuleiro_id_tabuleiro = $idtabu; }



//     public function calcular_diagonal(){

//         $diagonal = $this->lado * 1.44;
    
//         return $diagonal;

// }
public function __toString(){

    return  "<br> lado: ".$this->getlado().
    "<br> cor: ".$this->getcor().
    "<br> id tabuleiro: ".$this->getid().
    "<br>   area: " .$this->calcular_area().
    "<br> perimetro: " .$this->calcular_perimetro().
    "<br> diagonal: " .$this->calcular_diagonal().
    "<br> static: " .self::$contador;

}

// public abstract function desenha();
// public abstract function calcular_area();
// public abstract function inserir();
// public abstract function alterar();
// public abstract function excluir();
// public abstract static function listar($tipo = 0, $procurar = "");


}
    ?>