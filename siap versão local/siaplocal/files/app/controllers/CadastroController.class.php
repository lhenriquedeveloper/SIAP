<?php

/**
 * @Descricao: Controlador padrão do Sistema
 * Responsável por:
 * 1 - Carregar a view index

 */
class CadastroController extends Controller {

    
    public function Index() {
            

        $Mensagem = "Estou executando o método <b>" . __FUNCTION__ . "</b> do Objeto $this->NomeObjeto";
        $this->Info($Mensagem);

        $Dados['Conteudo'] = 'usuario/cadastro.php';
        $Dados['class_body'] = 'bg-dark';
        $Dados['Titulo'] = 'Cadastro';


        $this->Load("Template.php", $Dados);
    }
        
}

  

