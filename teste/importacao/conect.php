<?php
#exit();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

#REQUIRES ==
require_once __DIR__.'/../../classEp.php';

#INICIAR CLASSE ==
$classEp = new classEp;

#CONEXÃO COM O BANCO DE DADOS ==
$conectBdEp = $classEp->conectBdEp();

?>