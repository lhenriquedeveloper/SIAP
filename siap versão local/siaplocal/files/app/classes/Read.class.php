<?php

/**
 * @Descricao: Classe responsável pelo select no BD
 * @Autor: Prof. Iury Gomes
 * @Email: iury.oliveira@ifto.edu.br
 * @copyright (c) 2018, Campus Araguaína - IFTO
 * @Versao 1.0
 * @Atributos $NomeObjeto(Public)
 */
class Read extends ConexaoBD {

    private $Tabela; // Nome da Tabela para a consulta 
    private $Dados; // Dados da consulta 
    private $Termos; // Termos da pesquisa 
    private $Controle; // Dados de controle da operação 
    private $Resultado; // Armazena a resposta do seletc 
    private $sql; // Armazenar o sql que será filtrado para executação 
    private $sql_preparado; // Armazena o sql após a filtragem 
    private $ConexaoRead; // Armazena a conexão com o BD
    protected $table = 'siap';   
    function __construct($NomeObjeto) {

        self::ObjetoCriado($NomeObjeto);
    }

    public function ExecutarRead(string $Tabela, $Termos = null, $Dados = null) {

        $this->Tabela = $Tabela;
        $this->Dados = $Dados;
        $this->Termos = $Termos;
        $this->Controle = array();

        $this->Executar();
    }

    private function Conectar() {

        $this->ConexaoRead = parent::ObterConexao('ConexaoRead');
    }

    private function MontarSql() {

        if (empty($this->Termos)):
            $this->sql = "SELECT * FROM $this->Tabela";
            $this->sql_preparado = $this->ConexaoRead->prepare($this->sql);
            // O resultado vir no formato de array
            $this->sql_preparado->setFetchMode(PDO::FETCH_ASSOC); //            
        endif;

        if ($this->Dados):
            $this->sql = "SELECT * FROM $this->Tabela $this->Termos";
            $this->sql_preparado = $this->ConexaoRead->prepare($this->sql);
            //var_dump($this->sql_preparado);
            foreach($this->Dados as $chave => $valor):
                 // Substituindo os valores dentro do sql
                 $this->sql_preparado->bindValue(':'.$chave,$valor);
            endforeach;
           
            // O resultado vir no formato de array
            $this->sql_preparado->setFetchMode(PDO::FETCH_ASSOC); //
        endif;
        //var_dump($this->sql_preparado);
    }

    public function LinhasRecuperadas() {
        return $this->sql_preparado->rowCount();
    }

    public function Resultado() {
        return $this->Resultado;
    }
    
    public function Controle() {
        return $this->Controle;
    }

    public function Executar() {

        $this->Conectar();
        $this->MontarSql();

        $this->ConexaoRead->beginTransaction(); // Iniciando a operação no BD
        $this->sql_preparado->execute(); // Executando operação no BD
        $this->Controle['Operacao'] = $this->ConexaoRead->commit(); // Finalizando a operação no BD
        $this->Controle['Qtade de Linhas Recuperadas'] = $this->LinhasRecuperadas();
        $this->Controle['Erros'] = 'Sem erros';
        $this->Resultado = $this->sql_preparado->fetchAll();

        if ($this->Controle['Operacao'] === false):
            $this->Controle['Qtade de Linhas Recuperadas'] = 0;
            $this->Controle['Erros'] = $this->sql_preparado->errorInfo();
            $this->Resultado = 'Sem Resultados';
        endif;
    }

}
