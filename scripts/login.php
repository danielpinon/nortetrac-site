<?php

if((isset($_POST['emailLoginEp'])) && (isset($_POST['senhaLoginEp']))){

	#REQUIRES ==
	require_once "./conect.php";

	#COLETANDO DADOS ==
	$emailLoginEp = $classEp->escapaCaracteresEp($_POST['emailLoginEp']);
	if(strlen($emailLoginEp) == 0){
		$emailLoginEp = uniqid();
	}
	
	$senhaLoginEp = $classEp->escapaCaracteresEp($_POST['senhaLoginEp']);
	if(strlen($senhaLoginEp) == 0){
		$senhaLoginEp = uniqid();
	}
	$senhaLoginEp = hash('whirlpool', md5($senhaLoginEp));

	#COOKIE ==
	$timeExpiraCk = (86400*2)+time();
	$dominioCk = $classEp->dominioCk;
	$tokenCk = hash('whirlpool', md5($timeExpiraCk));
	$timeExcluirCk = date("Y-m-d H:i:s", strtotime("+2 days"));
	$ipTk = $_SERVER["REMOTE_ADDR"];

	#CONSULTAR DADOS ==
	$queryCa = mysqli_query($conectBdEp, "SELECT * FROM usuarios WHERE loginCa='$emailLoginEp' AND senhaCa='$senhaLoginEp'") or die(mysqli_error($conectBdEp));
	$rowCa = mysqli_fetch_assoc($queryCa);
	$totalCa = mysqli_num_rows($queryCa);

	if($totalCa > 0){

		$codCa = $rowCa['codCa'];
		$nomeCa = $rowCa['nomeCa'];

		#GRAVAR TOKENS ==
		$codTk = uniqid();
		$codCaTk = $codCa;
		$tokenTk = $tokenCk;
		$timeExpiraTk = $timeExcluirCk;

		#SALVAR TOKEN ==
		mysqli_query($conectBdEp, "
			INSERT INTO token 
			(
				codTk,
				codCaTk,
				tokenTk,
				timeExpiraTk
			) VALUES
			(
				'$codTk',
				'$codCaTk',
				'$tokenTk',
				'$timeExpiraTk'
			)
		") or die(mysqli_error($conectBdEp));

		#FECHAR COOKIES ==
		setcookie('codCaUsu', '');
		setcookie('nomeCaUsu', '');
		setcookie('tokenTk', '');
		setcookie('codClienteCaUsu', '');
		
		#CONFIGURAR COOKIE ==
		setcookie('codCaUsu', $codCa, $timeExpiraCk, '/', $dominioCk);
		setcookie('nomeCaUsu', $nomeCa, $timeExpiraCk, '/', $dominioCk);
		setcookie('tokenTk', $tokenTk, $timeExpiraCk, '/', $dominioCk);

		#RESULTADO ==
		$javascript = '<script>window.top.loginOkEp()</script>';

	} else {

		#RESULTADO ==
		$javascript = '<script>window.top.loginErroEp()</script>';

	}

	echo $javascript;

}

?>