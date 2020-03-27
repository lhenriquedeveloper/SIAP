<?php

/**
 * @Descricao: Classe responsável pela inserção de dados no BD 
 * @Autor: Prof. Iury Gomes
 * @Email: iury.oliveira@ifto.edu.br
 * @copyright (c) 2018, Campus Araguaína - IFTO
 * @Versao 1.0
 * @Atributos $NomeObjeto(Public)
 */
class Create extends ConexaoBD {

    private $Tabela; // Nome da Tabela para a consulta 
    private $Dados; // Dados da consulta 
    private $Controle; // Dados de controle da operação 
    private $sql; // Armazenar o sql que será filtrado para executação 
    private $sql_preparado; // Armazena o sql após a filtragem 
    private $ConexaoCreate; // Armazena a conexão com o BD

    function __construct($NomeObjeto) {

        self::ObjetoCriado($NomeObjeto);
    }

    public function ExecutarCreate(string $Tabela, array $Dados) {

        $this->Tabela = $Tabela;
        $this->Dados = $Dados;
        $this->Controle = array();

        $this->MontarSql();
        $this->Executar();
    }

    private function Conectar() {

        $this->ConexaoCreate = parent::ObterConexao('ConexaoCreate');
        $this->sql_preparado = $this->ConexaoCreate->prepare($this->sql);
    }

    private function MontarSql() {

        $colunas = implode(',', array_keys($this->Dados));
        $valores = ':' . implode(', :', array_keys($this->Dados));
        $this->sql = "INSERT INTO $this->Tabela ($colunas) VALUES ($valores)";
        //var_dump($this->sql);
    }

    public function LinhasAlteradas() {
        return $this->sql_preparado->rowCount();
    }

    public function Resultado() {
        return $this->Controle;
    }

    public function Executar() {

        $this->Conectar();

        $this->ConexaoCreate->beginTransaction(); // Iniciando a operação no BD
        $this->sql_preparado->execute($this->Dados); // Executando operação no BD
        $this->Controle['ID Inserido'] = $this->ConexaoCreate->lastInsertId(); // Ultimo ID inserido no BD
        $this->Controle['Operacao'] = $this->ConexaoCreate->commit(); // Finalizando a operação no BD
        $this->Controle['Qtade de Linhas Alteradas'] = $this->LinhasAlteradas();
        $this->Controle['Erros'] = 'Sem erros';

        if ($this->Controle['Operacao'] === false):
            $this->Controle['ID Inserido'] = 0;
            $this->Controle['Qtade de Linhas Alteradas'] = 0;
            $this->Controle['Erros'] = $this->sql_preparado->errorInfo();
        endif;
    }

}
