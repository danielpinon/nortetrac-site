<?php

#REQUIRES ==
require_once "./conect.php";

#VARIÁVEIS ==
$loopCa = array();
$dirEp = './';
$loopAq = array(
	'clientes-tacografos.csv',
	'clientes-candeias.csv',
	'clientes-nortetrac.csv',
	'clientes-manaus.csv'
);

foreach($loopAq as $nomeAqEp){

	$srcAqEp = $dirEp.$nomeAqEp;

	#CHECAR SE O ARQUIVO EXISTE ==
	if(file_exists($srcAqEp)){

		$arrayArqEp = file($srcAqEp);
		$i = 0;

		foreach($arrayArqEp as $lnAqEp){

			#LINHA DE DADOS ==
			$arrayLnAqEp = explode(';', $lnAqEp);

			#RETORNADO DADOS ==
			$docCa = preg_replace('/[^0-9]/i', '', trim($arrayLnAqEp[0]));

			$clienteCa = $classEp->escapaCaracteresEp(trim($arrayLnAqEp[1]));
			$razaoSocialCa = $clienteCa;
			$nomeFantasiaCa = $classEp->escapaCaracteresEp(trim($arrayLnAqEp[1]));
			$nomeCa = $classEp->escapaCaracteresEp(trim($arrayLnAqEp[3]));
			$bairroCa = $classEp->escapaCaracteresEp(trim($arrayLnAqEp[4]));
			$cidadeCa = $classEp->escapaCaracteresEp(toUtf8(trim($arrayLnAqEp[5])));
			$estadoCa = $classEp->escapaCaracteresEp(trim($arrayLnAqEp[6]));
			$telefoneCa = $classEp->escapaCaracteresEp(trim($arrayLnAqEp[7]));
			
			$emailCa = $classEp->escapaCaracteresEp(trim($arrayLnAqEp[8]));
			$emailCa = str_replace(
				array(
					'"',
					',',
					"'",
					'\\'
				),
				array(
					'',
					';',
					'',
					''
				),
				$emailCa
			);

			if(strlen($docCa) > 0){

				$codCa = uniqid();

				#CONSULTAR CLIENTE ==
				$queryCa = mysqli_query($conectBdEp, "
					SELECT * FROM
						clientes
					WHERE
						docCa='$docCa'
				") or die(mysqli_error($conectBdEp));
				$totalCa = mysqli_num_rows($queryCa);

				if($totalCa == 0){
					
					#INSERIR CADASTRO ==
					mysqli_query($conectBdEp, "
						INSERT INTO
							clientes
							(
								codCa,
								docCa,
								razaoSocialCa,
								nomeFantasiaCa,
								nomeCa,
								bairroCa,
								cidadeCa,
								estadoCa,
								telefoneCa,
								emailCa,
								clienteCa
							)
							VALUES
							(
								'$codCa',
								'$docCa',
								'$razaoSocialCa',
								'$nomeFantasiaCa',
								'$nomeCa',
								'$bairroCa',
								'$cidadeCa',
								'$estadoCa',
								'$telefoneCa',
								'$emailCa',
								'$clienteCa'
							)
					") or die(mysqli_error($conectBdEp));

				}

				#ADICIONAR AO LOOP DE CADASTROS ==
				array_push(
					$loopCa,
					array(
						'docCa'=>$docCa,
						'clienteCa'=>$clienteCa,
						'nomeCa'=>$nomeCa,
						'bairroCa'=>$bairroCa,
						'cidadeCa'=>$cidadeCa,
						'estadoCa'=>$estadoCa,
						'telefoneCa'=>$telefoneCa,
						'emailCa'=>$emailCa,
						'totalCa'=>$totalCa
					)
				);

			}

		}

	} else {
		echo '<h1>NÃO EXISTE</h1>';
	}

	echo '<pre>';
	print_r($loopCa);

}

?>