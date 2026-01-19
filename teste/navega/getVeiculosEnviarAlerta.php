<?php

#REQUIRE ==
require_once "conect.php";

#CONSULTAR DADOS ==
$querySc = mysqli_query($conectBdEp, "
	SELECT * FROM
		histEquipSemComunic
	WHERE
		notificadoEmailSc = 0 
") or die(mysql_error($conectBdEp));
$rowsSc = mysqli_fetch_assoc($querySc);
$totalSc = mysqli_num_rows($querySc);

$codsClienteSc = array();
$codsSc = array();
$codsViSc = array();
$codsVgSc = array();

if($totalSc > 0){

	do{

		$codSc = $rowsSc['codSc'];
		$codClienteSc = $rowsSc['codClienteSc'];
		$codViSc = $rowsSc['codViSc'];
		$codVgSc = $rowsSc['codVgSc'];
		$positionTimeViSc = $rowsSc['positionTimeViSc'];

		if(strlen($codClienteSc) > 0){

			array_push(
				$codsClienteSc,
				"'$codClienteSc'"
			);

		}

		if(strlen($codSc) > 0){

			array_push(
				$codsSc,
				"'$codSc'"
			);

		}

		if(strlen($codViSc) > 0){

			array_push(
				$codsViSc,
				"'$codViSc'"
			);

		}

		if(strlen($codVgSc) > 0){

			array_push(
				$codsVgSc,
				"'$codVgSc'"
			);

		}

	}while($rowsSc = mysqli_fetch_assoc($querySc));

} else {

	echo('Não existem equipamentos para notificar');

	exit();

}

$codsSc = array_unique($codsSc);
$codsSc = join(",", $codsSc);

#CODIGOS DE CLIENTES ==
$codsClienteSc = array_unique($codsClienteSc);
$codsClienteSc = join(",", $codsClienteSc);

if(strlen($codsClienteSc) > 0){

	$queryCa = mysqli_query($conectBdEp, "
		SELECT * FROM
			clientes
		WHERE
			codCa IN($codsClienteSc)
	") or die(mysql_error($conectBdEp));
	$rowsCa = mysqli_fetch_assoc($queryCa);
	$totalCa = mysqli_num_rows($queryCa);

	$arrayCa = array();
	$arrayCa['totalCa'] = 0;
	$arrayCa['loopCa'] = array();

	if($totalCa > 0){

		do{

			$codCa = $rowsCa['codCa'];
			$clienteCa = $rowsCa['clienteCa'];
			$emailNotificacoesCa = $rowsCa['emailNotificacoesCa'];

			$arrayCa['totalCa']++;
			$arrayCa['loopCa']["$codCa"]['codCa'] = $codCa;
			$arrayCa['loopCa']["$codCa"]['clienteCa'] = $clienteCa;
			$arrayCa['loopCa']["$codCa"]['emailNotificacoesCa'] = $emailNotificacoesCa;

		}while($rowsCa = mysqli_fetch_assoc($queryCa));

	}

}

#CODIGOS DE VEICULOS ==
$codsViSc = array_unique($codsViSc);
$codsViSc = join(",", $codsViSc);

if(strlen($codsViSc) > 0){

	$queryVi = mysqli_query($conectBdEp, "
		SELECT * FROM
			veiculos
		WHERE
			codVi IN($codsViSc)
	") or die(mysql_error($conectBdEp));
	$rowsVi = mysqli_fetch_assoc($queryVi);
	$totalVi = mysqli_num_rows($queryVi);

	$arrayVi = array();
	$arrayVi['totalVi'] = 0;
	$arrayVi['loopVi'] = array();

	if($totalVi > 0){

		do{

			$codVi = $rowsVi['codVi'];
			$codClienteVi = $rowsVi['codClienteVi'];
			$clienteVi = '';
			$emailNotificacoesVi = '';
			$NameVi = $rowsVi['NameVi'];
			$AddressVi = $rowsVi['AddressVi'];
			$CodeVi = $rowsVi['CodeVi'];
			$PositionTimeVi = $rowsVi['PositionTimeVi'];
			$PositionTimeViBr = date("Y-m-d H:i:s", strtotime("$PositionTimeVi -3 hours"));

			$arrayVi['totalVi']++;
			$arrayVi['loopVi']["$codVi"]['codVi'] = $codVi;
			$arrayVi['loopVi']["$codVi"]['codClienteVi'] = $codClienteVi;
			$arrayVi['loopVi']["$codVi"]['clienteVi'] = $clienteVi;
			$arrayVi['loopVi']["$codVi"]['emailNotificacoesVi'] = $emailNotificacoesVi;
			$arrayVi['loopVi']["$codVi"]['NameVi'] = $NameVi;
			$arrayVi['loopVi']["$codVi"]['AddressVi'] = $AddressVi;
			$arrayVi['loopVi']["$codVi"]['CodeVi'] = $CodeVi;
			$arrayVi['loopVi']["$codVi"]['PositionTimeVi'] = $PositionTimeVi;
			$arrayVi['loopVi']["$codVi"]['PositionTimeViBr'] = $PositionTimeViBr;

		}while($rowsVi = mysqli_fetch_assoc($queryVi));

	}

}

#CODIGOS DE VIAGENS ==
$codsVgSc = array_unique($codsVgSc);
$codsVgSc = join(",", $codsVgSc);

if(strlen($codsVgSc) > 0){

	$queryVg = mysqli_query($conectBdEp, "
		SELECT * FROM
			viagens
		WHERE
			codVg IN($codsVgSc)
	") or die(mysql_error($conectBdEp));
	$rowsVg = mysqli_fetch_assoc($queryVg);
	$totalVg = mysqli_num_rows($queryVg);

	$arrayVg = array();
	$arrayVg['totalVg'] = 0;
	$arrayVg['loopVg'] = array();

	if($totalVg > 0){

		do{

			$codVg = $rowsVg['codVg'];
			$codViVg = $rowsVg['codViVg'];

			$arrayVg['totalVg']++;
			$arrayVg['loopVg']["$codVg"]['codVg'] = $codVg;
			$arrayVg['loopVg']["$codVg"]['codViVg'] = $codViVg;

		}while($rowsVg = mysqli_fetch_assoc($queryVg));

	}

}

#SETAR DADOS ==
if($arrayVi['totalVi'] > 0){

	foreach($arrayVi['loopVi'] as $keyVi => $rowsVi) {

		$codVi = $rowsVi['codVi'];
		$codClienteVi = $rowsVi['codClienteVi'];

		if(isset($arrayCa['loopCa']["$codClienteVi"]['clienteCa'])){

			$clienteCa = $arrayCa['loopCa']["$codClienteVi"]['clienteCa'];
			$emailNotificacoesCa = $arrayCa['loopCa']["$codClienteVi"]['emailNotificacoesCa'];

			$arrayVi['loopVi']["$codVi"]['clienteVi'] = $clienteCa;
			$arrayVi['loopVi']["$codVi"]['emailNotificacoesVi'] = $emailNotificacoesCa;

		}

	}

}

#MONTAR MENSAGENS PARA ENVIO DE EMAIL ==
$loopDestinoEmail = array();

if($arrayVi['totalVi'] > 0){

	foreach($arrayVi['loopVi'] as $keyVi => $rowsVi){

		$clienteVi = $rowsVi['clienteVi'];
		$emailNotificacoesVi = $rowsVi['emailNotificacoesVi'];

		$NameVi = $rowsVi['NameVi'];
		$AddressVi = $rowsVi['AddressVi'];
		$CodeVi = $rowsVi['CodeVi'];
		$PositionTimeViBr = $rowsVi['PositionTimeViBr'];

		$destinoEmail = '';
		$assuntoEmail = utf8_decode('EQUIPAMENTOS SEM COMUNICAÇÃO DO CLIENTE ').$clienteVi;

		$textoEmail = '';
		$textoEmail .= '<div><b>CLIENTE:</b> '.$clienteVi.'</div>';

		$textoEmail .= '<div>';
		$textoEmail .= '<b>VEICULO/EQUIPAMENTO:</b> '.$NameVi;
		$textoEmail .= utf8_decode(' - <b>ULTIMA POSIÇÃO:</b> ').$PositionTimeViBr;
		$textoEmail .= '</div>';

		array_push(
			$loopDestinoEmail,
			array(
				'emailDestEm' => $destinoEmail,
				'emailCopiaEm' => $emailNotificacoesVi,
				'assuntoEm' => $assuntoEmail,
				'textoEm' => $textoEmail,
			)
		);

	}

} 

echo '<pre>';
print_r($arrayVi);

$arrayPostEp = array(
	'nomeRemEm' => 'Alertas Nortetrac',
	'loopDestEm' => $loopDestinoEmail
);

$resultadoEnvio = $classEp->apiSMTP($arrayPostEp);
echo '<pre>'; 
print_r($resultadoEnvio);

#SETAR COMO NOTIFICADO POR EMAIL ==
mysqli_query($conectBdEp, "
	UPDATE histEquipSemComunic SET 
		notificadoEmailSc = 1
	WHERE
		codSc IN($codsSc)
	") or die(mysqli_error($conectBdEp));

?>