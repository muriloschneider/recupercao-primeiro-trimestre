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
    
}

$ret = new retangulo(1, 'rosa', 1, 10, 40);

?>