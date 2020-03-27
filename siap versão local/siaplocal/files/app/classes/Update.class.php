<?php

/**
 * @Descricao: Classe responsável pelo update no BD
 * @Autor: Prof. Iury Gomes
 * @Email: iury.oliveira@ifto.edu.br
 * @copyright (c) 2018, Campus Araguaína - IFTO
 * @Versao 1.0
 * @Atributos $NomeObjeto(Public)
 */
class Update extends ConexaoBD {

    private $Tabela; // Nome da Tabela para a consulta 
    private $Dados; // Dados da consulta 
    private $Termos; // Termos da pesquisa 
    private $Valores; // Valores que serão substituídos 
    private $Controle; // Dados de controle da operação  
    private $sql; // Armazenar o sql que será filtrado para executação 
    private $sql_preparado; // Armazena o sql após a filtragem 
    private $ConexaoUpdate; // Armazena a conexão com o BD

    function __construct($NomeObjeto) {

        self::ObjetoCriado($NomeObjeto);
    }

    public function ExecutarUpdate(string $Tabela, array $Dados, $Termos, array $Valores) {

        $this->Tabela = $Tabela;
        $this->Dados = $Dados;
        $this->Termos = $Termos;
        $this->Valores = $Valores;
        $this->Controle = array();

        $this->MontarSql();
        $this->Executar();
    }

    private function Conectar() {

        $this->ConexaoUpdate = parent::ObterConexao('ConexaoUpdate');
        $this->sql_preparado = $this->ConexaoUpdate->prepare($this->sql);
    }

    private function MontarSql() {

        foreach ($this->Dados as $Indices => $Valor):
            $strings[] = $Indices . ' = :'.$Indices;
        endforeach;
        
        $strings = implode(', ', $strings);
        
        $this->sql = "UPDATE $this->Tabela SET $strings $this->Termos";
        var_dump($this->sql);
    }

    public function LinhasAlteradas() {
        return $this->sql_preparado->rowCount();
    }

    public function Resultado() {
        return $this->Controle;
    }

    public function Executar() {

        $this->Conectar();
        

        $this->ConexaoUpdate->beginTransaction(); // Iniciando a operação no BD
        $this->sql_preparado->execute(array_merge($this->Dados, $this->Valores)); // Executando operação no BD
        $this->Controle['Operacao'] = $this->ConexaoUpdate->commit(); // Finalizando a operação no BD
        $this->Controle['Qtade de Linhas Alteradas'] = $this->LinhasAlteradas();
        $this->Controle['Erros'] = 'Sem erros';

        if ($this->Controle['Operacao'] === false):
            $this->Controle['Qtade de Linhas Alteradas'] = 0;
            $this->Controle['Erros'] = $this->sql_preparado->errorInfo();
        endif;
    }

}
