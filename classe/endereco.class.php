<?php

class endereco{

private $id;
private $rua;
private $numero;
private $bairro;

public function __construct($id, $rua, $numero, $bairro) {
    
     $this->setid($id);
     $this->setrua($rua);
     $this->setnumero($numero);
     $this->setbairro($bairro);

    }

    public function getid(){  return $this->id; }
    public function setid($id) { $this->id = $id; }

    public function getrua(){  return $this->rua; }
    public function setrua($rua) { $this->rua = $rua; }

    public function getnumero(){  return $this->numero; }
    public function setnumero($numero) { $this->numero = $numero; }

    public function getbairro(){  return $this->bairro; }
    public function setbairro($bairro) { $this->bairro = $bairro; }

        function excluir(){

            $sql = 'DELETE FROM endereco WHERE id = :id';

            $parametros = array(":id"=>$this->getid());
        
                return parent::executacomando($sql, $parametros);
    }

        public function editar(){

            $sql = "UPDATE endereco
            SET rua = :rua, numero = :numero, bairro = :bairro
            WHERE id = :id";

            $par = array(' :rua'=>$this->getrua() ,
              ':numero'=>$this->getnumero() ,
              ':id'=>$this->getid() ,
              ':bairro'=>$this->getbairro() );

                return parent::executacomando($sql, $par);
    }

}

?>