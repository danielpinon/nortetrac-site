<?php

$pastaRootEp = $_SERVER['DOCUMENT_ROOT'];

#SHOW ERROS ==
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

#REQUIRES ==
require_once __DIR__ . '/classEp.php';

#INICIAR CLASSE ==
$classEp = new classEp;

#DEFINIR URL SITE ==
$HTTP_HOST = $_SERVER['HTTP_HOST'];
if(isset($_SERVER['SERVER_PORT'])){
	$urlSite = 'https://';
} else {
	$urlSite = 'http://';
}
$urlSite .= $HTTP_HOST;

#VARIÁVEIS ==
$urlApp = $classEp->urlApp;
$nomeSiteEp = 'Nortetrac';

#ANOS EMPRESA ==
$anosEmpresaEp = (date("Y")-2007);

?>