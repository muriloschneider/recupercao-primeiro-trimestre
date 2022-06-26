<?php

require_once('forma.class.php');
$ret = new retangulo(1, 'rosa', 1, 10, 40);

class retangulo extends forma{

private $altura;
private $base;

public function __construct($altura, $base) {

    parent::__construct($id, $cor, $tab, $altura, $base);
    parent::__construct($id, $cor, $tab);
    $this->setaltura($altura);
    $this->setbase($base);

}

    public function getaltura(){  return $this->altura; }
    public function getbase(){  return $this->base; }

    public function setaltura($altura) { $this->altura = $altura; }
    public function setbase($base) { $this->base = $base; }

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




public static function inserir($lado, $cor, $tabuleiro_id_tabuleiro){
        

    echo $lado; echo $cor; echo $tabuleiro_id_tabuleiro;

     $pdo = Conexao::getInstance();
     $stmt = $pdo->prepare('INSERT INTO quadrado (lado, cor, tabuleiro_id_tabuleiro) VALUES(:lado, :cor, :tabuleiro_id_tabuleiro)');
     $stmt->bindParam(':lado', $lado, PDO::PARAM_STR);
     $stmt->bindParam(':cor', $cor, PDO::PARAM_STR);
     $stmt->bindParam(':tabuleiro_id_tabuleiro', $tabuleiro_id_tabuleiro, PDO::PARAM_STR);

     // $lado = $this->getlado();
     // $cor = $this->getcor(); 
     // $tabuleiro_id_tabuleiro = $this->getidtabu(); 
     return $stmt->execute();



    // $stmt->debugDumpparams();
     
 }
}
?>