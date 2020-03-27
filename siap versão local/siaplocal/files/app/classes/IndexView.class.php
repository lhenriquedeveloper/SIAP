<?php

// REQUERENDO ARQUIVO DE CONFIGURACAO
require_once './config/Config.php';

// REQUERENDO ARQUIVOS DAS CLASSES DE FORMA AUTOMATICA
require_once './app/core/AutoLoad.class.php';
//var_dump(__DIR__);
$Loader = new AutoLoad('$Loader');
//var_dump($Loader);

$Core = new Core('$Core');
$Core->Executar();
class IndexView extends View {

    public function Index($Dados) {

        $Mensagem = "Estou executando o método <b>" . __FUNCTION__ . "</b> do Objeto $this->NomeObjeto";
        $this->InfoDebug($Mensagem);

        //echo "Estou aqui";
//        $Head = $this->MontarHead($Dados['Head'], TEMPLATE_INDEX);
//        $Body = $this->MontarBody($Dados['Body'], TEMPLATE_INDEX);
//        //$Footer = $this->MontarFooter($Dados['Footer'], TEMPLATE_INDEX);
//        //$Scripts = $this->MontarScripts($Dados['Scripts'], TEMPLATE_INDEX);
////        $View = $this->MontarTemplate(TEMPLATE_INDEX, $Dados['Head'], $Body, $Dados['Scripts'], $Dados['Footer'];
        $View = $this->MontarTemplate(TEMPLATE_INDEX);
//
        echo $View;
    }
    
    public function Dermatoglifia() {

        $Mensagem = "Estou executando o método <b>" . __FUNCTION__ . "</b> do Objeto $this->NomeObjeto";
        $this->InfoDebug($Mensagem);

        $View = file_get_contents(TEMPLATE_INDEX . "/conteudo/".__FUNCTION__.".html");
        //$View = $this->MontarTemplate(TEMPLATE_INDEX);

        echo $View;
    }
    public function Funcionalidade() {

        $Mensagem = "Estou executando o método <b>" . __FUNCTION__ . "</b> do Objeto $this->NomeObjeto";
        $this->InfoDebug($Mensagem);

        $View = file_get_contents(TEMPLATE_INDEX . "/conteudo/".__FUNCTION__.".html");
        //$View = $this->MontarTemplate(TEMPLATE_INDEX);

        echo $View;
    }
    public function Sobre() {

        $Mensagem = "Estou executando o método <b>" . __FUNCTION__ . "</b> do Objeto $this->NomeObjeto";
        $this->InfoDebug($Mensagem);

        $View = file_get_contents(TEMPLATE_INDEX . "/conteudo/".__FUNCTION__.".html");
        //$View = $this->MontarTemplate(TEMPLATE_INDEX);

        echo $View;
    }
    public function Cadastro() {

        $Mensagem = "Estou executando o método <b>" . __FUNCTION__ . "</b> do Objeto $this->NomeObjeto";
        $this->InfoDebug($Mensagem);

        $View = file_get_contents(TEMPLATE_INDEX . "/conteudo/".__FUNCTION__.".html");
        //$View = $this->MontarTemplate(TEMPLATE_INDEX);

        echo $View;
    }
    public function Login() {

        $Mensagem = "Estou executando o método <b>" . __FUNCTION__ . "</b> do Objeto $this->NomeObjeto";
        $this->InfoDebug($Mensagem);

        $View = file_get_contents(TEMPLATE_INDEX . "/conteudo/".__FUNCTION__.".html");
        //$View = $this->MontarTemplate(TEMPLATE_INDEX);

        echo $View;
    }
    public function Usuario() {

        $Mensagem = "Estou executando o método <b>" . __FUNCTION__ . "</b> do Objeto $this->NomeObjeto";
        $this->InfoDebug($Mensagem);

        $View = file_get_contents(TEMPLATE_INDEX . "/conteudo/".__FUNCTION__.".html");
        //$View = $this->MontarTemplate(TEMPLATE_INDEX);

        echo $View;
    }

}
