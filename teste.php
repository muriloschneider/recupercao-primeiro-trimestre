

    <?php
include_once "quadrado.class.php";

include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";


$id = 24;
$quad = new quadrado(0, 0 , "");


$pdo = Conexao::getInstance();
        $stmt = $pdo->prepare("UPDATE `quadrado` SET `lado` = :lado, `cor` = :cor WHERE (`id` = :id);");
    
        // $stmt->bindValue(':id', $this->setId($this->id), PDO::PARAM_INT);
        // $stmt->bindValue(':lado', $this->setLado($this->lado), PDO::PARAM_STR);
        // $stmt->bindValue(':cor', $this->setCor($this->cor), PDO::PARAM_STR);


        return $stmt->execute();




?>
