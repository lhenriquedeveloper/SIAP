<?php

/**
 * @Descricao: Núcleo da aplicação web
 * @Author Prof. Iury Gomes
 * @Email iury.oliveira@ifto.edu.br
 * @copyright (c) 2018, Campus Araguaína - IFTO
 * @Versão 0.1
 */
abstract class Model extends Depuracao {

    public $NomeObjeto; //Nome do Objeto
    private $Read; // Para realizar operações de select
    private $Create; // Para realizar operações de insert
    private $Update; // Para realizar operações de atualização
    private $Delete; // Para realizar operações de exclusão

    function __construct($NomeObjeto) {
        $this->NomeObjeto = $NomeObjeto;

        $Mensagem = "O objeto <b>" . $this->NomeObjeto . "</b> foi construido !";
        //$this->Info($Mensagem);
    
    }

    function __destruct() {

        $Mensagem = "O objeto <b>" . $this->NomeObjeto ."</b> foi destruido !";
        //$this->Info($Mensagem);
    }

   public function Buscar($Tabela, $Termos = null, $Valores = null){
       
        $Mensagem = "Estou executando o método <b>" . __FUNCTION__ . "</b> do Objeto $this->NomeObjeto";
        //$this->Info($Mensagem);
        
        $this->Read = new Read('$Read');
        $this->Read->ExecutarRead($Tabela, $Termos, $Valores);
        $resposta = $this->Read->Resultado();
        $controle = $this->Read->Controle();
        $resultado = array_merge($controle, $resposta);
        return $resultado;
              
   }
   
   public function Inserir(){
       
   }
   
   public function Atualizar(){
       
   }
   public function Deletar(){
       
   }

}
