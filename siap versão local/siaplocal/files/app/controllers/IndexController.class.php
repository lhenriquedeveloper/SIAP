<?php

/**
 * @Descricao: Objeto Index
 * @Author Prof. Iury Gomes
 * @Email iury.oliveira@ifto.edu.br
 * @copyright (c) 2018, Campus Araguaína - IFTO
 * @Versão 0.1
 */
class IndexController extends Controller {

    public function Index(){
        
        $Mensagem = "Estou executando o método <b>".__FUNCTION__."</b> do Objeto $this->NomeObjeto";
        $this->Info($Mensagem);  
        
        $Dados['Conteudo'] = 'index/Default.php';
        $Dados['class_body'] = 'container-fluid';
        $Dados['Titulo'] = 'Index - Inicio';
        $Dados['Login'] = URL_BASE . "login";
        $Dados['ListarUsuarios'] = URL_BASE . "usuario/listar";
        
        $this->Load("Template.php", $Dados);
    }

}
