<?php

$buscaSt = '';
$pagina = 0;

#VARIAVEL AMIGAVEL ==
if(isset($_SERVER['REQUEST_URI'])){
	
	$variavelAmigavel = explode('/', substr($_SERVER['REQUEST_URI'], 1));
	
	#VARIAVEIS 
	$tipo = '';
	if(isset($variavelAmigavel[0])){
		$tipo = $variavelAmigavel[0];	
	}
	
	$tipoConteudo = '';
	if(isset($variavelAmigavel[1])){
		$tipoConteudo = $variavelAmigavel[1];	
	}
	
	$idConteudo = '';
	if(isset($variavelAmigavel[2])){
		$idConteudo = $variavelAmigavel[2];	
	}
	
	$titulo_conteudo = '';
	if(isset($variavelAmigavel[3])){
		$titulo_conteudo = $variavelAmigavel[3];
	}

} else {

	#VARIAVEIS ==
	$tipo = '';
	if(isset($_GET['tipo'])){
		$tipo = $_GET['tipo'];	
	}
	
	$idConteudo = '';
	if(isset($_GET['id'])){
		$idConteudo = $_GET['id'];	
	}
	
	$tipoConteudo = '';
	if(isset($_GET['tipoConteudo'])){
		$tipoConteudo = $_GET['tipoConteudo'];
	}

}

#TIPOS DE PÁGINAS ==
if($tipo == ''){

	$paginaInclude = './includes/home.php';

} elseif($tipo == 'tacografos'){

	$paginaInclude = './includes/tacografos.php';

} elseif($tipo == 'diat-atv'){

	$paginaInclude = './includes/diat-atv.php';

} elseif($tipo == 'diat-atv-arquivos'){

	$paginaInclude = './includes/diat-atv-arquivos.php';

} elseif($tipo == 'diat-atv-download'){

	$paginaInclude = './includes/diat-atv-download.php';

} elseif($tipo == 'diat-atv-diagnostico-arquivos'){

	$paginaInclude = './includes/diat-atv-diagnostico-arquivos.php';

} elseif($tipo == 'diat-atv-arquivos-cliente'){

	$paginaInclude = './includes/diat-atv-arquivos-cliente.php';

} elseif($tipo == 'diat-atv-arquivos-cliente-download'){

	$paginaInclude = './includes/diat-atv-arquivos-cliente-download.php';

} elseif($tipo == 'diat-tacografos-fotos-videos'){

	$paginaInclude = './includes/diat-tacografos-fotos-videos.php';

} elseif($tipo == 'diat-tacografos-fotos-videos-finalizados'){

	$paginaInclude = './includes/diat-tacografos-fotos-videos-finalizados.php';

} elseif($tipo == 'login'){

	$paginaInclude = './includes/login.php';

} elseif($tipo == 'recuperar-senha'){

	$paginaInclude = './includes/recuperar-senha.php';

} else {

	$paginaInclude = './includes/home.php';

}

?>