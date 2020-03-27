<head>
<title>SIAP</title>
<link rel="sortcut icon" href="assests/img/icone/foto.ico" />
</head>
<?php

// requerendo arquivo de configuração
require_once './config/config.php';

// requerendo arquivo de classes de forma automatica
require_once './app/core/AutoLoad.class.php';
$Loader = new AutoLoad('$Loader');

$Core = new Core('$Core');
$Core->Executar();

