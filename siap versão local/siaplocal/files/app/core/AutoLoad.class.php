<?php

/**
 * @Descricao: Classe destinada a realizar o carregamento automatico de classes
 * e arquivos
 * @Autor Prof. Iury Gomes
 * @Email iury.oliveira@ifto.edu.br
 * @copyright (c) 2018, Campus Araguaína - IFTO
 * @Versão 1.0
 */
class AutoLoad {

    public $NomeObjeto; //Nome do Objeto
    private static $Raiz = PASTA_RAIZ; //Pasta Raiz do Sistema

    function __construct($NomeObjeto) {
        $this->NomeObjeto = $NomeObjeto;

        if (DEBUG === true):
            echo "<div class=\"alert alert-info\" role=\"alert\">
                <i>INFO</i>: O objeto <b>" . $this->NomeObjeto . "</b> foi construido !
             </div>";
        endif;


        spl_autoload_extensions('.class.php');
        spl_autoload_register(array($this, 'CarregarClasse'));
    }

    function __destruct() {

        if (DEBUG === true):
            echo "<div class=\"alert alert-info\" role=\"alert\">
                  <i>INFO</i>: O objeto <b>" . $this->NomeObjeto . "</b> foi destruido !
             </div>";
        endif;
    }
    
    private function CarregarClasse($NomeClasse) {

        $extensao = spl_autoload_extensions();
        
        $Classe = $this->EncontrarArquivo($NomeClasse.$extensao);
        if($Classe):
            require_once $Classe;
        else:
            echo "<div class=\"alert alert-info\" role=\"alert\">
                  <i>INFO</i>: Classe <b> $Classe </b> não foi encontrada !
             </div>";
        endif;
        
    }
    
    public function EncontrarArquivo($ArquivoResquisitado){
        
        $Diretorios = new RecursiveDirectoryIterator(self::$Raiz);
        $SubDiretorios = new RecursiveIteratorIterator($Diretorios);
        
        foreach ($SubDiretorios as $Arquivos):
            //echo $Arquivo->getFilename() . "<br>";
            //echo $Arquivo->getPathname() . "<br>";
            $Arquivo = $Arquivos->getFilename();
            if($Arquivo === $ArquivoResquisitado):
                return $Arquivos->getPathname();
            endif;
        endforeach;
        
        return false; 
        
    }

}
