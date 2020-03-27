<?php
/**
 * @Descricao: Controlador padrão do Sistema
 * Responsável por:
 * 1 - Carregar a view index
 */
class UsuarioController extends Controller {

    
    public function Index() {
            
        $this->CarregarView('Index', 'Sobre');
    }

}