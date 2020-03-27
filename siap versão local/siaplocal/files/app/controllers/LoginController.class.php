<?php

/**
 * @Descricao: Objeto Usuario
 * @Author Prof. Iury Gomes
 * @Email iury.oliveira@ifto.edu.br
 * @copyright (c) 2018, Campus Araguaína - IFTO
 * @Versão 0.1
 */
class LoginController extends Controller {

    public function Index() {

        $Mensagem = "Estou executando o método <b>" . __FUNCTION__ . "</b> do Objeto $this->NomeObjeto";
        $this->Info($Mensagem);

        $Dados['Conteudo'] = 'login/Login.php';
        $Dados['class_body'] = 'bg-dark';
        $Dados['Titulo'] = 'Login';
        $Dados['EntrarSistema'] = 'login/entrarSistema';

        $this->Load("Template.php", $Dados);
    }

    public function EntrarSistema() {

        $Mensagem = "Estou executando o método <b>" . __FUNCTION__ . "</b> do Objeto $this->NomeObjeto";
        $this->Info($Mensagem);

        
        $POST = $this->POST();
         //var_dump($POST);
        if ($POST):
            $UsuarioModel = new UsuarioModel('$UsuarioModel');
            $resultado = $UsuarioModel->VerificarUsuario($POST);
            //var_dump($resultado);
            if ($resultado['Qtade de Linhas Recuperadas'] === 1):

                $Dados['Conteudo'] = 'usuario/Acesso.php';
                $Dados['class_body'] = 'container-fluid';
                $Dados['Titulo'] = 'Acesso realizado';
                $this->Load("Template.php", $Dados);
            else:
                $Dados['Conteudo'] = 'usuario/Erro.php';
                $Dados['class_body'] = 'bg-danger';
                $Dados['Titulo'] = 'Acesso nao realizado';
                $this->Load("Template.php", $Dados);
            endif;
        endif;

        $this->Load("Template.php", $Dados);
    }

}
