<?php

/**
 * Descricao da Classe Depuracao.class:
 * 
 * @author Prof. Iury Gomes
 * @copyright (c) 2018, Campus Araguaína - IFTO
 */
class Depuracao {

    public function Info($Mensagem) {

        if (DEBUG === true):

            echo "<div class=\"alert alert-info\" role=\"alert\">
                     <i>INFO</i>: $Mensagem
                   </div>";
        endif;
    }

    public static function InfoEstatico($Mensagem) {

        if (DEBUG === true):

            echo "<div class=\"alert alert-info\" role=\"alert\">
                     <i>INFO</i>: $Mensagem
                   </div>";
        endif;
    }

    function NomeMetodo($NomeMetodo) {

        if (DEBUG === true):
            echo "<hr>";
            echo "Executando Método <i><b>$NomeMetodo</i></b>";
            echo "<hr>";
        endif;
    }

    function VerAtributos($NomeObjeto) {

        echo "<div class=\"alert alert-info\" role=\"alert\">";
        echo "<i>INFO: " . __FUNCTION__ . " </i><br><br>";

        echo "<span class=\"text-uppercase font-weight-bold\">"
        . "1. Os atributos de $NomeObjeto são:"
        . "</span>";
       

        echo "</div>";
    }

    function VerObjeto($NomeObjeto) {

        echo "<div class=\"alert alert-info\" role=\"alert\">";
        echo "<i>INFO: " . __FUNCTION__ . " </i><br><br>";

        echo "<span class=\"text-uppercase font-weight-bold\">"
        . "1. Nome do Objeto:</span> $NomeObjeto <br><br>";

        echo "<span class=\"text-uppercase font-weight-bold\">"
        . "2. Objeto da Classe: </span>" . get_class($this) . "<br><br>";

        echo "<span class=\"text-uppercase font-weight-bold\">"
        . "3. Os atributos do Objeto são:"
        . "</span>";
        

        $class_methods = get_class_methods(get_class($this));

        echo "<span class=\"text-uppercase font-weight-bold\">"
        . "4. Os metodos do Objeto são:"
        . "</span><br>";
        foreach ($class_methods as $method_name):
            echo "$method_name <br>";
        endforeach;

        echo "</div>";
    }

    function VerPai($NomeObjeto) {

        echo "<div class=\"alert alert-info\" role=\"alert\">";
        echo "<i>INFO: " . __FUNCTION__ . " </i><br><br>";


        echo "<span class=\"text-uppercase font-weight-bold\">"
        . "1. Nome do Objeto:</span> $NomeObjeto <br><br>";

        echo "<span class=\"text-uppercase font-weight-bold\">"
        . "2. O <b>PAI</b> do objeto $NomeObjeto é: </span>";

        if (get_parent_class($this)):
            echo get_parent_class($this);
        else:
            echo "<span class=\"text-danger\"><b>NÃO</b></span> possui um pai";
        endif;

        echo "</div>";
    }

    function VerAncestrais($NomeObjeto, $Ancestral) {


        echo "<div class=\"alert alert-info\" role=\"alert\">";
        echo "<i>INFO: " . __FUNCTION__ . " </i><br><br>";

        echo "<span class=\"text-uppercase font-weight-bold\">"
        . "1. Nome do Objeto:</span> $NomeObjeto <br><br>";

        echo "<span class=\"text-uppercase font-weight-bold\">"
        . "2. Este objeto: </span>";

        if (is_subclass_of($this, $Ancestral)):
            echo "<b><span class=\"text-success\">POSSUI</span> $Ancestral</b> como um de seus Ancestrais";
        else:
            echo "<span class=\"text-danger\"><b>NÃO</b></span> possui <b>$Ancestral</b> como um de seus Ancestrais";
        endif;

        echo "</div>";
    }

}
