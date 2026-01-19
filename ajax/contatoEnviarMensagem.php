<?php

if((isset($_POST['rand'])) && (isset($_POST['nome'])) && (isset($_POST['telefone'])) && (isset($_POST['email'])) && (isset($_POST['assunto'])) && (isset($_POST['mensagem']))){

	#REQUIRES ==
	require_once "./conect.php";

	#COLETANDO DADOS ==
	$nome = $classEp->escapaCaracteresEp(utf8_decode($_POST['nome']));
	$telefone = $classEp->escapaCaracteresEp($_POST['telefone']);
	$email = $classEp->escapaCaracteresEp($_POST['email']);
	$assunto = $classEp->escapaCaracteresEp(utf8_decode($_POST['assunto']));
	$mensagem = $classEp->escapaCaracteresEp(utf8_decode(nl2br($_POST['mensagem'])));

	#EMAIL PARA O COMPRADOR ==
	$data = date("d/m/Y");
	$hora = date("H:i:s");
	$assuntoEm = utf8_decode("Mensagem enviada pelo site do $nomeSiteEp - $nome - $data as $hora");
	$textoEm = utf8_decode('

		Mensagem enviada pelo site do '.$nomeSiteEp.' {{DATA}} as {{HORA}}
		
		<br><br>

		<strong>Nome:</strong> {{NOME}}<br>
		<strong>Telefone:</strong> {{TELEFONE}}<br>
		<strong>E-mail:</strong> {{EMAIL}}<br>
		<strong>Assunto:</strong> {{ASSUNTO}}<br>
		<strong>Mensagem:</strong><br>
		{{MENSAGEM}}
		

	');

	#PROCESSAR MENSAGEM ==
	$arrayOrig = array(
		'{{TEXTO-EMAIL}}',
		'{{NOME}}',
		'{{TELEFONE}}',
		'{{EMAIL}}',
		'{{ASSUNTO}}',
		'{{MENSAGEM}}',
		'{{DATA}}',
		'{{HORA}}'
	);
	$arraySubs = array(
		$textoEm,
		$nome,
		$telefone,
		$email,
		$assunto,
		$mensagem,
		$data,
		$hora
	);

	$modeloEmailEp = file_get_contents("../layoutEmail/layoutEmail.php");
	$modeloEmailEp = str_replace($arrayOrig, $arraySubs, $modeloEmailEp);

	#VARIÁVEIS PARA O ENVIO DE E-MAIL == 
	$loopDestEm = array(
		array(
			'emailDestEm'=>'saullo.pinheiro@nortetrac.com.br; renato@empredi.com.br; cassia.porto@nortetrac.com.br',
			'assuntoEm'=>$assuntoEm,
			'textoEm'=>$modeloEmailEp
		)
	);

	#INFORMAAÇÕES DE REMENTENTE ==
	$nomeRemEm = toUtf8('NorteTrac');
	$emailRemEm = 'no-reply@nortetrac.com.br';

	#VARIÁVEIS PARA O ENVIO DE E-MAIL == 
	$arrayPostEp = array(
		'nomeRemEm'=>$nomeRemEm, 
		'emailRemEm'=>$emailRemEm,
		'loopDestEm'=>$loopDestEm
	);

	$resultadoEp = $classEp->apiSMTP($arrayPostEp);

}

?>