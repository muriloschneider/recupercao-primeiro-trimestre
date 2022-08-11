<?php

class endereco{

private $id_endereco;
private $rua;
private $numero;
private $bairro;

public function __construct($id_endereco, $rua, $numero, $bairro) {
    
     $this->setid_endereco($id_endereco);
     $this->setrua($rua);
     $this->setnumero($numero);
     $this->setbairro($bairro);

    }

    public function getid_endereco(){  return $this->id_endereco; }
    public function setid_endereco($id_endereco) { $this->id_endereco = $id_endereco; }

    public function getrua(){  return $this->rua; }
    public function setrua($rua) { $this->rua = $rua; }

    public function getnumero(){  return $this->numero; }
    public function setnumero($numero) { $this->numero = $numero; }

    public function getbairro(){  return $this->bairro; }
    public function setbairro($bairro) { $this->bairro = $bairro; }

        function excluir(){

            $sql = 'DELETE FROM endereco WHERE id_endereco = :id_endereco';

            $parametros = array(":id_endereco"=>$this->getid_endereco());
        
                return parent::executacomando($sql, $parametros);
    }

        public function editar(){

            $sql = "UPDATE endereco
            SET rua = :rua, numero = :numero, bairro = :bairro
            WHERE id_endereco = :id_endereco";

            $par = array(' :rua'=>$this->getrua() ,
              ':numero'=>$this->getnumero() ,
              ':id_endereco'=>$this->getid_endereco() ,
              ':bairro'=>$this->getbairro() );

                return parent::executacomando($sql, $par);
    }

}

?>