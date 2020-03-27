<?php

/**
 * @Descricao: Classe que vai se responsabilizar pela conexão com o BD
 * @Autor: Prof. Iury Gomes
 * @Email: iury.oliveira@ifto.edu.br
 * @copyright (c) 2018, Campus Araguaína - IFTO
 * @Versao 1.0
 * @Atributos $NomeObjeto(Public)
 */
class ConexaoBD extends Singleton {

    private static $DSN;
    private static $Driver = 'mysql';
    private static $Host = 'localhost';
    private static $Usuario = 'siap';
    private static $Senha = 'siap';
    private static $Banco = 'siap';
    
    // Aqui existe polimorfismo
    private static function getInstancia($NomeObjeto = null){
        
         if (self::$instancia === null):
             
             // Data Name Source
             self::$DSN = self::$Driver . ':host=' . self::$Host . ';dbname=' . self::$Banco;
             
             // Configurando o PDO para trabalhar com codificação UTF 8
            $config = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
            
            // Tentanto estabelecer conexao com o BD
            self::$instancia = new PDO(self::$DSN, self::$Usuario, self::$Senha, $config);
            
            //Configurando os tipos de erros que podem ser gerados pelo banco de dados
            // Os erros serão gerados utilizando o modo de erros de exceção
            self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::ObjetoCriado($NomeObjeto);
            return self::$instancia;

        else:

            self::ObjetoJaCriado();
            return self::$instancia;

        endif;
         
    }
    
    public static function ObterConexao($NomeObjeto){
        return self::getInstancia($NomeObjeto);
    }
    
    public static function VerAtributosEstaticos(){
        
        echo '<hr> DADOS DE CONEXÃO COM O BANCO <hr>';
        echo 'HOST';
        var_dump(self::$Host);
        echo 'USUARIO';
        var_dump(self::$Usuario);
        echo 'SENHA';
        var_dump(self::$Senha);
        echo 'BANCO';
        var_dump(self::$Banco);
        echo 'DSN';
        var_dump(self::$DSN);
        echo 'CONEXAO';
        var_dump(self::$instancia);
        
    } 
    
}
