<?php

/**
 * @Descricao: 
 * @Autor: Prof. Iury Gomes
 * @Email: iury.oliveira@ifto.edu.br
 * @copyright (c) 2018, Campus Araguaína - IFTO
 * @Versao 1.0
 * @Atributos $NomeObjeto(Public)
 */
abstract class Singleton extends Depuracao {

    /**
     * @Acesso: Publico
     * @Tipo: static
     * @Descrição: Armazena o nome do objeto 
     */
    public static $NomeObjeto; //Nome do Objeto

    /**
     * @Acesso: Protected
     * @Tipo: static
     * @Descrição: Armazena a única instância de objeto desta classe 
     */
    protected static $instancia;

    // 1. É necessario impedir que o sistema possa realizar qualquer tipo
    // de instanciação automatica, o poder de criar objetos deve ficar 
    // sob o domínio do desenvolver, e não do sistema de forma automatica
    // o construtor __construct é declaro como private para prevenir que uma
    // criação de objetos seja realizada pelo operador new
    private function __construct() {
        
    }

    // o método mágico __clone é declarado como private para previnir as cloanagens
    // de qualquer objeto que possa ser criado
    private function __clone() {
        
    }

    // O método mágico __wakeup é declarado como private para previnir a 
    // desserialização de um instância dessa classe pela função global unserialize()
    private function __wakeup() {
        
    }

    /**
     * @Acesso: Publico
     * @Descrição: Método que realiza a destruição do objeto 
     * @Retorno: Sem retornos  
     */
    public function __destruct() {

        echo "<div class=\"alert alert-info\" role=\"alert\">
                  <i>INFO</i>: O objeto <b>" . self::$NomeObjeto . "</b> foi destruido !
             </div>";
    }

    public static function ObjetoCriado($NomeObjeto) {

        self::$NomeObjeto = $NomeObjeto;

        echo "<div class=\"alert alert-info\" role=\"alert\">
                <i>INFO</i>: O objeto <b>" . self::$NomeObjeto . "</b> foi construido !
             </div>";
    }

    public static function ObjetoJaCriado() {

        echo "<div class=\"alert alert-info\" role=\"alert\">
                <i>INFO</i>: O objeto <b>" . self::$NomeObjeto . "</b> já foi construido !
             </div>";
    }

    // Esse método faz o controle de criação da instancia[
    // E permitirá que apenas uma seja criada
    private static function getInstancia($NomeObjeto) {

        if (self::$instancia === null):

            self::$instancia = new self;
            self::ObjetoCriado($NomeObjeto);
            return self::$instancia;

        else:

            self::ObjetoJaCriado();
            return self::$instancia;

        endif;
    }

}
