<?php

/**
 * @Descricao: Controller principal do sistema
 * @Author Prof. Iury Gomes
 * @Email iury.oliveira@ifto.edu.br
 * @copyright (c) 2018, Campus Araguaína - IFTO
 * @Versão 0.1
 */
class Controller extends Depuracao {

    public $NomeObjeto; //Nome do Objeto

    function __construct($NomeObjeto) {
        $this->NomeObjeto = $NomeObjeto;

        $Mensagem = "O objeto <b>" . $this->NomeObjeto . "</b> foi construido !";
        $this->Info($Mensagem);
    }

    function __destruct() {

        $Mensagem = "O objeto <b>" . $this->NomeObjeto . "</b> foi destruido !";
        $this->Info($Mensagem);
    }

    public function Load($Arquivo, $Dados = null) {

        // extrai as chaves de um array e os transformando em variaveis php
        if (isset($Dados)):
            extract($Dados);
        endif;

        $EncontrarArquivo = new AutoLoad('$EncontrarArquivo');
        $View = $EncontrarArquivo->EncontrarArquivo($Arquivo);
        if ($View):
            require_once $View;
        else:

            echo "<div class=\"alert alert-info\" role=\"alert\">
                    <i>INFO</i>: A view <b>" . $View . "</b> não foi encontrada !
                  </div>";
        endif;
    }

    public function POST() {

        $Mensagem = "Estou executando o método <b>" . __FUNCTION__ . "</b> do Objeto $this->NomeObjeto";
        $this->Info($Mensagem);
        
        $POST = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        if(empty($POST)):
            return false;
        else:
            return $POST;
        endif;
    }

}
