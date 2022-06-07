<?php
//usuario
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

    class usuario{
        private $id_usuario;
        private $nome_usuario;
        private $login;
        private $senha;
    
    
    public function __construct($idusu, $nomeusu, $login, $senha) {
        $this->setIdusu($idusu);
        $this->setnomeusu($nomeusu);
        $this->setlogin($login);
        $this->setsenha($senha);
    }

   

    public function getidusu(){  return $this->id_usuario; }
    public function getnomeusu(){  return $this->nome_usuario; }
    public function getlogin(){  return $this->login; }
    public function getsenha(){  return $this->senha; }
   

    public function setidusu($idusu) { $this->id_usuario = $idusu; }
    public function setnomeusu($nomeusu) { $this->nome_usuario = $nomeusu; }
    public function setlogin($login) { $this->login = $login; }
    public function setsenha($senha) { $this->senha = $senha; }
    
    

   public function buscar($idusu){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM usuario WHERE id_usuario = $idusu");
        $dados = array();
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $dados['id_usuario'] = $linha['id_usuario'];
                $dados['nome_usuario'] = $linha['nome_usuario'];
                $dados['login'] = $linha['login'];
                $dados['senha'] = $linha['senha'];
        }
        //var_dump($dados);
        return $dados;
    }

    function excluir(){
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('DELETE FROM usuario WHERE id_usuario = :id_usuario');
        $stmt->bindValue(':id_usuario', $this->getidusu());
        
        return $stmt->execute();
    }
    public function editar(){
            
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare("UPDATE `usuario` SET `nome_usuario` = :nome_usuario, `login` = :login, `senha` = :senha WHERE (`id_usuario` = :id_usuario);");
    
        $stmt->bindValue(':id_usuario', $this->getidusu(), PDO::PARAM_INT);
        $stmt->bindValue(':nome_usuario', $this->getnomeusu(), PDO::PARAM_STR);
        $stmt->bindValue(':login', $this->getlogin(), PDO::PARAM_STR);
        $stmt->bindValue(':senha', $this->getsenha(), PDO::PARAM_STR);

        return $stmt->execute();

       
        
    }

    public function __toString(){

        return  "<br> nome: ".$this->getnomeusu().
        "<br> login: ".$this->getlogin().
        "<br> senha: ".$this->getsenha();
        
    }

    public function inserir(){
        
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('INSERT INTO usuario (nome_usuario, login, senha) VALUES(:nome_usuario, :login, :senha)');
        $stmt->bindValue(':nome_usuario', $this->getnomeusu(), PDO::PARAM_STR);
        $stmt->bindValue(':login', $this->getlogin(), PDO::PARAM_STR);
        $stmt->bindValue(':senha', $this->getsenha(), PDO::PARAM_STR);

        // $nome_usuario = $this->getnomeusu();
        // $login = $this->getlogin(); 
        // $senha = $this->getsenha(); 
        return $stmt->execute();
        
    }


    public function listar($tipo = 0, $procurar = ""){
        

        $pdo = Conexao::getInstance();
        if($tipo==""){
            $tipo = $pdo->query("SELECT * FROM usuario 
                                     WHERE id_usuario LIKE '$procurar%'
                                     ORDER BY id_usuario");
        }
        
         else if($tipo =="1"){
            $tipo = $pdo->query("SELECT * FROM usuario 
                                     WHERE id_usuario LIKE '$procurar%'
                                     ORDER BY id_usuario");
        }
        
         else if($tipo =="2"){
            $tipo = $pdo->query("SELECT * FROM usuario 
                                     WHERE nome_usuario LIKE '$procurar%' 
                                     ORDER BY nome_usuario");
        }
        
        
        
        else if($tipo =="3"){
            $tipo = $pdo->query("SELECT * FROM usuario 
                                     WHERE login LIKE '$procurar%' 
                                     ORDER BY login");
        }
        else if($tipo =="4"){
            $tipo = $pdo->query("SELECT * FROM usuario 
                                     WHERE senha LIKE '$procurar%' 
                                     ORDER BY senha");
        }
        

//var_dump($tipo);
        return $tipo;

    }

}

?>
