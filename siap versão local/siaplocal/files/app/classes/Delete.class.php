<?php

/**
 * @Descricao: Classe responsável pelo delete no BD
 * @Autor: Prof. Iury Gomes
 * @Email: iury.oliveira@ifto.edu.br
 * @copyright (c) 2018, Campus Araguaína - IFTO
 * @Versao 1.0
 * @Atributos $NomeObjeto(Public)
 */
class Delete extends ConexaoBD {

    private $Tabela; // Nome da Tabela para a consulta 
    private $Termos; // Termos da pesquisa 
    private $Valores; // Valores que serão substituídos 
    private $Controle; // Dados de controle da operação  
    private $sql; // Armazenar o sql que será filtrado para executação 
    private $sql_preparado; // Armazena o sql após a filtragem 
    private $ConexaoDelete; // Armazena a conexão com o BD

    function __construct($NomeObjeto) {

        self::ObjetoCriado($NomeObjeto);
    }

    public function ExecutarDelete(string $Tabela, string $Termos, string $Valores) {

        $this->Tabela = $Tabela;
        $this->Termos = $Termos;
        parse_str($Valores, $this->Valores);
        $this->Controle = array();

        $this->MontarSql();
        $this->Executar();
    }

    private function Conectar() {

        $this->ConexaoDelete = parent::ObterConexao('ConexaoDelete');
        $this->sql_preparado = $this->ConexaoDelete->prepare($this->sql);
    }

    private function MontarSql() {

        $this->sql = "DELETE FROM $this->Tabela $this->Termos";
    }

    public function LinhasDeletadas() {
        return $this->sql_preparado->rowCount();
    }

    public function Resultado() {
        return $this->Controle;
    }

    public function Executar() {

        $this->Conectar();

        $this->ConexaoDelete->beginTransaction(); // Iniciando a operação no BD
        $this->sql_preparado->execute($this->Valores); // Executando operação no BD
        $this->Controle['Operacao'] = $this->ConexaoDelete->commit(); // Finalizando a operação no BD
        $this->Controle['Qtade de Linhas Deletadas'] = $this->LinhasDeletadas();
        $this->Controle['Erros'] = 'Sem erros';

        if ($this->Controle['Operacao'] === false):
            $this->Controle['Qtade de Linhas Deletadas'] = 0;
            $this->Controle['Erros'] = $this->sql_preparado->errorInfo();
        endif;
    }

}
