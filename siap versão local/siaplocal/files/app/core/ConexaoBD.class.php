<?php

class ConexaoBD{
    

private $Dsn;
private $Driver = 'mysql';
private $Host = 'localhost';
private $email = 'siaplocal';
private $senha = 'siaplocal';
private $banco = 'db_siaplocal';
private $PDO;

public function ObterConexao(){
     try {
            //Aqui instaciamos a classe PDO que realizara a conexão com o banco de dados
            $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',);
            $this->PDO = new PDO($this->Driver . ':host=' . $this->Host . ';dbname=' . $this->banco, $this->email, $this->senha,$options);
            
        } catch (Exception $ex) {
            //Caso haja algum erro na conexao, o erro será imprimido na tela
            echo 'Erro na conexão: ' . $ex->getMessage();
        }
        
        return $this->PDO;
      
}
}