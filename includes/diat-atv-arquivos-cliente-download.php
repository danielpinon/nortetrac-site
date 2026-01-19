<?php

if(strlen($tipoConteudo) > 0){

  #CONEXÃO COM O BANCO DE DADOS ==
  $conectBdEp = $classEp->conectBdEp();

  #COLETANDO DADOS ==
  $codDt = $tipoConteudo;

  $fileEp = __DIR__.'/../../nortetrac-app/imprimir/diatDtATVCliente.php';

  if(file_exists($fileEp)){

    #REQUIRES ==
    require_once "$fileEp";

  } else {

    echo '<h1>DOCUMENTO NÃO EXISTE!</h1>';
    echo $fileEp;
    
  }

}

