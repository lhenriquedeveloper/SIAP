<?php

// CONFIGURAÇÕES NO BANCO DE DADOS ############################################
define('DRIVER','mysql');
define('HOST','localhost');
define('USUARIO','siap');
define('SENHA','siap');
define('BANCO','bd_siap');

// CONFIGURAÇÕES PADRÃO #######################################################
define('CONTROLLER_PADRAO','Index');
define('METODO_PADRAO','Index');
define('PASTA_RAIZ','C:\xampp\htdocs\siaplocal\files');
define('URL_BASE','');

//MODO DEBUG ##################################################################
define('DEBUG',false);

// LINKS ######################################################################
//CSS
define('CSS_BOOTSTRAP', URL_BASE."assets/css/bootstrap.min.css");
define('CSS_FONT',URL_BASE."assets/css/font-awesome.min.css");
define('CSS_ADMIN',URL_BASE."assets/css/sb-admin.min.css");
define('CSS_ESTILO',URL_BASE."assets/css/estilo.css");
// JS
define('JS_JQUERY',URL_BASE."assets/js/jquery.min.js");
define('JS_BOOTSTRAP', URL_BASE."assets/js/bootstrap.bundle.min.js");
define('JS_JQUERY_EASING', URL_BASE."assets/js/jquery.easing.min.js");
define('JS_ADMIN', PASTA_RAIZ."assets/js/sb-admin.min.js");

// VIEWS ####################################################################

define('HEAD', PASTA_RAIZ."\app\miews\Head.php");
define('SCRIPTS', PASTA_RAIZ."\app\miews\Scripts.php");
define('CABECALHO', PASTA_RAIZ."\app\miews\Cabecalho.php");
define('RODAPE', PASTA_RAIZ."\app\miews\Rodape.php");