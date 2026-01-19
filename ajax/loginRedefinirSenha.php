<?php

if((isset($_POST['rand'])) && (isset($_POST['tpAcaoCa']))){

	#REQUIRES ==
	require_once "./conect.php";

	#VARIÁVEIS ==
	$urlSiteLoginEp = $urlSite.'/login';
	$data = date("d/m/Y");
	$hora = date("H:i:s");
	$ano = date("Y");

	#COLETANDO DADOS ==
	$tpAcaoCa = $classEp->escapaCaracteresEp($_POST['tpAcaoCa']);

	if(($tpAcaoCa == 'solicitacao') && (isset($_POST['emailLoginEp']))){

		#COLETANDO DADOS ==
		$emailLoginEp = $classEp->escapaCaracteresEp($_POST['emailLoginEp']);

		#CONSULTAR DADOS ==
		$queryCa = mysqli_query($conectBdEp, "SELECT * FROM usuarios WHERE loginCa='$emailLoginEp' AND excluidoCa=0") or die(mysqli_error($conectBdEp));
		$rowCa = mysqli_fetch_assoc($queryCa);
		$totalCa = mysqli_num_rows($queryCa);

		#PROCESSAR ==
		if($totalCa > 0){

			#RETORNANDO DADOS ==
			$codCa = $rowCa['codCa'];
			$nomeCa = utf8_encode($rowCa['nomeCa']);
			$loginCa = utf8_encode($rowCa['loginCa']);
			$loginCa = 'renato@empredi.com.br';

			#GERAR CÓDIGO DE RECUPERAÇÃO ==
			$codSn = uniqid();
			$codCaSn = $codCa;
			$strtotimeValidadeSn = strtotime("+24 hours");
			$timeValidadeSn = date("Y-m-d H:i", $strtotimeValidadeSn);
			$timeValidadeSnlLabel = str_replace(array(' ', ':'), array(' as ', 'h'), date("d/m/Y H:i", $strtotimeValidadeSn));
			$urlRedefinirSenhaSn = $urlSite.'/recuperar-senha/'.$codSn;

			#SALVAR INFORMAÇÕES ==
			mysqli_query($conectBdEp, "INSERT INTO usuariosCaRecSenhaSn 
				(
					codSn,
					codCaSn,
					timeValidadeSn
				) VALUES
				(
					'$codSn',
					'$codCaSn',
					'$timeValidadeSn'
				)
			") or die(mysqli_error($conectBdEp));

			#FECHAR CONEXÃO COM BANCO DE DADOS ==
			$classEp->closeConectBdEp();

			#EMAIL PARA O COMPRADOR ==
			$assuntoEm = utf8_decode("RECUPERAÇÃO SENHA EM $data AS $hora");
			$textoEm = utf8_decode('

				Olá <strong>'.$nomeCa.'</strong>
				
				<br><br>

				Você solicitou a recuperação de senha para o email '.$loginCa.'

			    <br><br>

			    Acesse o link <a href="'.$urlRedefinirSenhaSn.'">'.$urlRedefinirSenhaSn.'</a> para redefinir a senha.

			    <br><br>
			    Link válido até '.$timeValidadeSnlLabel.'

			');

			#PROCESSAR MENSAGEM ==
			$arrayOrig = array(
				'{{TEXTO-EMAIL}}',
				'{{DATA}}',
				'{{HORA}}',
				'{{ANO}}'
			);
			$arraySubs = array(
				$textoEm,
				$data,
				$hora,
				$ano,
				
			);

			$modeloEmailEp = file_get_contents("../layoutEmail/layoutEmail.php");
			$modeloEmailEp = str_replace($arrayOrig, $arraySubs, $modeloEmailEp);

			#VARIÁVEIS PARA O ENVIO DE E-MAIL == 
			$loopDestEm = array(
				array(
					'emailDestEm'=>$loginCa,
					'assuntoEm'=>$assuntoEm,
					'textoEm'=>$modeloEmailEp
				)
			);

			#INFORMAAÇÕES DE REMENTENTE ==
			$nomeRemEm = utf8_encode('NorteTrac');
			$emailRemEm = 'no-reply@nortetrac.com.br';

			#VARIÁVEIS PARA O ENVIO DE E-MAIL == 
			$arrayPostEp = array(
				'nomeRemEm'=>$nomeRemEm, 
				'emailRemEm'=>$emailRemEm,
				'loopDestEm'=>$loopDestEm
			);

			$resultadoEp = $classEp->apiSMTP($arrayPostEp);

			$jsonCa = array(
				'totalCa'=>$totalCa,
				'tpAcaoCa'=>$tpAcaoCa
			); 

		} else {

			$jsonCa = array(
				'totalCa'=>$totalCa,
				'tpAcaoCa'=>$tpAcaoCas
			); 

		}

	} elseif(($tpAcaoCa == 'salvar-nova-senha') && (isset($_POST['codSn'])) && (isset($_POST['senhaLoginCa'])) && (isset($_POST['senhaLoginCaConfirm']))){

		#GERAR NOVA SENHA ==
		$codSn = $classEp->escapaCaracteresEp($_POST['codSn']);
		$senhaLoginCaNv = $classEp->escapaCaracteresEp($_POST['senhaLoginCa']);
		$senhaLoginCa = hash('whirlpool', md5($senhaLoginCaNv));
		$senhaLoginTempCa = $senhaLoginCaNv;

		#CONSULTAR CÓDIGO DE SOLICITAÇÃO DE AALTERAÇÃO DE SENHA ==
		$querySn = mysqli_query($conectBdEp, "SELECT * FROM usuariosCaRecSenhaSn WHERE codSn='$codSn' AND confirmadoSn=0") or die(mysqli_error($conectBdEp));
		$rowSn = mysqli_fetch_assoc($querySn);
		$totalSn = mysqli_num_rows($querySn);

		if($totalSn > 0){

			#RETORNANDO DADOS ==
			$codCaSn = $rowSn['codCaSn'];

			#CONSULTAR DADOS ==
			$queryCa = mysqli_query($conectBdEp, "SELECT * FROM usuarios WHERE codCa='$codCaSn' AND excluidoCa=0") or die(mysqli_error($conectBdEp));
			$rowCa = mysqli_fetch_assoc($queryCa);
			$totalCa = mysqli_num_rows($queryCa);

			if($totalCa > 0){

				$codCa = $rowCa['codCa'];
				$nomeCa = $rowCa['nomeCa'];
				$loginCa = $rowCa['loginCa'];
				
				#ATUALIZAR SENHA ==
				mysqli_query($conectBdEp, "UPDATE usuarios SET senhaCa='$senhaLoginCa' WHERE codCa='$codCa'") or die(mysqli_error($conect_bd_ep));

				#FECHAR CONEXÃO COM O BANCO DE DADOS ==
				$classEp->closeConectBdEp();
				
				#EMAIL PARA O COMPRADOR ==
				$assuntoEm = utf8_decode("ALERAÇÃO DE SENHA FEITA COM SUCESSO EM $data AS $hora");
				$textoEm = utf8_decode('

					Olá <strong>'.$nomeCa.'</strong>
					
					<br><br>

					Senha alterada com sucesso para '.$loginCa.' em {{DATA}} AS {{HORA}}

				    <br><br>

				    Acesse: <a href="'.$urlSite.'/login">'.$urlSite.'/login</a>.

				');

				#PROCESSAR MENSAGEM ==
				$arrayOrig = array(
					'{{TEXTO-EMAIL}}',
					'{{DATA}}',
					'{{HORA}}',
					'{{ANO}}'
				);
				$arraySubs = array(
					$textoEm,
					$data,
					$hora,
					$ano
				);

				$modeloEmailEp = file_get_contents("../layoutEmail/layoutEmail.php");
				$modeloEmailEp = str_replace($arrayOrig, $arraySubs, $modeloEmailEp);

				#VARIÁVEIS PARA O ENVIO DE E-MAIL == 
				$loginCa = 'renato@empredi.com.br';
				$loopDestEm = array(
					array(
						'emailDestEm'=>$loginCa,
						'assuntoEm'=>$assuntoEm,
						'textoEm'=>$modeloEmailEp
					)
				);

				#INFORMAAÇÕES DE REMENTENTE ==
				$nomeRemEm = utf8_encode('NorteTrac');
				$emailRemEm = 'no-reply@nortetrac.com.br';

				#VARIÁVEIS PARA O ENVIO DE E-MAIL ==
				$arrayPostEp = array(
					'nomeRemEm'=>$nomeRemEm, 
					'emailRemEm'=>$emailRemEm,
					'loopDestEm'=>$loopDestEm
				);

				$resultadoEp = $classEp->apiSMTP($arrayPostEp);

				$jsonCa = array(
					'totalCa'=>$totalCa,
					'tpAcaoCa'=>$tpAcaoCa
				); 

			} else {

				$jsonCa = array(
					'erro'
				);

			}

		} else {

			$jsonCa = array(
				'erro'
			);

		}

	} else {

		$jsonCa = array(
			'erro'
		);

	}

	$jsonCa = json_encode($jsonCa);
	echo $jsonCa;

}


?>