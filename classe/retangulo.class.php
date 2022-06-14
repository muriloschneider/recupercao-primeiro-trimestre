<?php

require_once('forma.class.php');

class retangulo extends forma{

private $altura;
private $base;

public function __construct($altura, $base) {

    parent::__construct($id, $cor, $tab, $altura, $base);
    parent::__construct($id, $cor, $tab);
    $this->setAltura($altura);
    $this->setBase($base);

}

    public function getaltura(){  return $this->altura; }
    public function getbase(){  return $this->base; }

    public function setAltura($altura) { $this->altura = $altura; }
    public function setBase($base) { $this->base = $base; }

    public function __toString(){

        return  "<br> altura: ".$this->getaltura().
        "<br> base: ".$this->getbase().
        "<br> cor: ".$this->getcor().
        "<br> id tabuleiro: ".$this->getid().
        "<br> .....: ".$this->gettab().
        "<br>   area: " .$this->calcular_area().
        "<br> perimetro: " .$this->calcular_perimetro().
        "<br> diagonal: " .$this->calcular_diagonal().
        "<br> static: " .self::$contador;

    }

}

$ret = new retangulo(1, 'rosa', 1, 10, 40);

?>