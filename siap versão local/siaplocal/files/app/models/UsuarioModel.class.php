<?php

/**
 * @Descricao: Objeto Usuario
 * @Author Prof. Iury Gomes
 * @Email iury.oliveira@ifto.edu.br
 * @copyright (c) 2018, Campus Araguaína - IFTO
 * @Versão 0.1
 */
class UsuarioModel extends Model {

    public function VerificarUsuario($Dados){
        
        $Mensagem = "Estou executando o método <b>" . __FUNCTION__ . "</b> do Objeto $this->NomeObjeto";
        $this->Info($Mensagem);
        
        $Termos = 'WHERE email = :email AND senha = :senha';
        //$Dados['senha'] = md5($Dados['senha']);
        
        $resultado = $this->Buscar('usuario', $Termos, $Dados);
        //var_dump($resultado);
        return $resultado;
        
        
    }  
    
    public function ListarUsuario(){
        
        $Mensagem = "Estou executando o método <b>" . __FUNCTION__ . "</b> do Objeto $this->NomeObjeto";
        $this->Info($Mensagem);
        
        $resultado = $this->Buscar('usuario');
        //var_dump($resultado);
        return $resultado;
    
        
    }  

}




