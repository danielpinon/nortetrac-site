<?php

#SHOW ERROS ==
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

#REQUIRES ==
require_once "./conect.php";
require_once "./condicionais.php";

if(file_exists($paginaInclude)){
  require_once $paginaInclude;
} else {
  echo 'PAGINA NÃO ENCONTRADA!';
  echo '<br>';
  echo $paginaInclude;
}

?>