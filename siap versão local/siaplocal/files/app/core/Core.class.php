<?php

/**
 * @Descricao: Núcleo da aplicação web
 * @Author Prof. Iury Gomes
 * @Email iury.oliveira@ifto.edu.br
 * @copyright (c) 2018, Campus Araguaína - IFTO
 * @Versão 0.1
 */
class Core extends Depuracao {

    public $NomeObjeto; //Nome do Objeto
    private $Controller; //Armazena o nome do controller
    private $Metodo; //Armazena o nome do metodo
    private $Parametros; //Armazena o nome dos parametros

    function __construct($NomeObjeto) {
        $this->NomeObjeto = $NomeObjeto;

        $Mensagem = "O objeto <b>" . $this->NomeObjeto . "</b> foi construido !";
        $this->Info($Mensagem);
        $this->AnalisarURL();
    }

    function __destruct() {

        $Mensagem = "O objeto <b>" . $this->NomeObjeto . "</b> foi destruido !";
        $this->Info($Mensagem);
    }

    function getController() {
        
        
        // NAS EXECUÇÕES SEGUINTES DO SISTEMA
        if(class_exists($this->Controller)):
            return $this->Controller;
        endif;
        
        // NA 1º EXECUÇÃO DO SISTEMA
        return CONTROLLER_PADRAO."Controller";
        
    }

    function getMetodo() {
       
        // NAS EXECUÇÕES SEGUINTES DO SISTEMA
        if(method_exists($this->Controller, $this->Metodo)):
            return $this->Metodo;
        endif;
        
        // NA 1º EXECUÇÃO DO SISTEMA
        return METODO_PADRAO;
    }

    function getParametros() {
        return $this->Parametros;
    }

    public function AnalisarURL() {

        //$this->NomeMetodo(__FUNCTION__);

        // Minimizando ataques do tipo XSS (Javascript Injection)
        $url = filter_input(INPUT_SERVER, 'PHP_SELF', FILTER_SANITIZE_URL);
        //var_dump($url);

        // dividindo url em duas partes, 
        // parte 1 = url_base, 
        // parte 2 = tudo o que estiver apos o index.php 
        $url = explode('index.php', $url);
        //var_dump($url);

        // $url recebe o ultimo elemento do array
        $url = end($url);
        //var_dump($url);
        //var_dump(empty($url));

        // Se URL não estiver vazia
        if (!empty($url)):
            $url = explode(DIRECTORY_SEPARATOR, $url);
            array_shift($url); // Descartando a primeira posição do vetor
            //var_dump($url);

            // Inicializando o Controller
            $this->Controller = ucfirst($url[0] . "Controller");
            //var_dump($this->Controller);
            array_shift($url); // Descartando o controller
            //var_dump($url);
            //var_dump(isset($url[0]));
            
            // Obtendo nome do método se existir na url informada
            if ( isset($url[0])):
                $this->Metodo = ucfirst($url[0]);
                array_shift($url); // Descartando o metodo
            else:
                $this->Metodo = METODO_PADRAO;
            endif;

            // Otendo os parametros se existirem na url informada
            if (isset($url[0])):
                $this->Parametros = array_filter($url);
            //array_shift($url); // Descartando o metodo
            else:
                $this->Parametros = false;
            endif;
        else:
            $this->Controller = CONTROLLER_PADRAO."Controller";
            
        endif;
    }

    private function ExecutarController($Objeto, $Metodo = null, $Parametros = null) {

        call_user_func_array(array($Objeto, $Metodo), array($Parametros));
    }

    public function Executar() {

        $Mensagem = "Executando o Método <b>" .__FUNCTION__. "</b> do objeto $this->NomeObjeto";
        $this->Info($Mensagem);

        $Controller = $this->getController();
        $Objeto = new $Controller("$Controller");
        
        $this->ExecutarController($Objeto, $this->getMetodo(), $this->getParametros());
    }

}
