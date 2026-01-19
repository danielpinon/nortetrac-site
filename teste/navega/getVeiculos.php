<?php

#REQUIRE ==
require_once "conect.php";

#VARIAVEIS ==
$PositionTimeVi = date("Y-m-d H:i:s", strtotime("+2 hours"));
$dataInicioEp = date("Y-m-d H:i:s", strtotime("-718 hours"));
$dataFimEp = date("Y-m-d H:i:s", strtotime("+2 hours"));

#LOOP DE EQUIPAMENTOS SEM COMUNICAÇÃO ==
$arraySc = array();
$arraySc['totalSc'] = 0;
$arraySc['loopSc'] = array();

#CONSULTAR TABELA DE VIAGENS ==
$queryVg = mysqli_query($conectBdEp, "
	SELECT * FROM
		viagens
	WHERE
		stsVg = 'andamento' AND 
		excluidoVg = 0
") or die(mysql_error($conectBdEp));
$rowsVg = mysqli_fetch_assoc($queryVg);
$totalVg = mysqli_num_rows($queryVg);

$arrayVg = array();
$arrayVg['totalVg'] = 0;
$arrayVg['loopVg'] = array();

$codsViVg = array();

if ($totalVg > 0){

	do {

		$codVg = $rowsVg['codVg'];
		$codViVg = $rowsVg['codViVg'];

		$arrayVg['totalVg']++;
		$arrayVg['loopVg']["$codViVg"]['codVg'] = $codVg;
		$arrayVg['loopVg']["$codViVg"]['codViVg'] = $codViVg;

		if (strlen($codViVg) > 0){

			array_push(
				$codsViVg,
				"'$codViVg'"
			);

		}

	}while($rowsVg = mysqli_fetch_assoc($queryVg));

}

#PROCESSO DE VIAGENS ==
$codsViVg = array_unique($codsViVg);
$codsViVg = join(",", $codsViVg);

#CONEXÃO COM O BANCO DE DADOS ==
$queryVi = mysqli_query($conectBdEp, "
	SELECT * FROM
		veiculos
	WHERE
		codVi IN($codsViVg) AND
		PositionTimeVi BETWEEN '$dataInicioEp' AND '$dataFimEp'
	ORDER BY
		PositionTimeVi DESC
") or die(mysql_error($conectBdEp));
$rowsVi = mysqli_fetch_assoc($queryVi);
$totalVi = mysqli_num_rows($queryVi);

$arrayVi = array();
$arrayVi['totalVi'] = 0;
$arrayVi['loopVi'] = array();

$codsVi = array();
$codsClienteVi = array();

if($totalVi > 0){

	do{

		$idVi = $rowsVi['idVi'];
		$codVi = $rowsVi['codVi'];
		$codClienteVi = $rowsVi['codClienteVi'];
		$clienteVi = '';
		$docClienteVi = '';
		$NameVi = utf8_decode($rowsVi['NameVi']);
		$AddressVi = $rowsVi['AddressVi'];
		$CodeVi = $rowsVi['CodeVi'];
		$PositionTimeVi = $rowsVi['PositionTimeVi'];
		$PositionTimeViBr = date("Y-m-d H:i:s", strtotime("$PositionTimeVi -3 hours"));
		$codVgVi = '';

		if(!isset($arrayVi['loopVi']["$codClienteVi"])){

			$arrayVi['loopVi']["$codClienteVi"]['codClienteVi'] = $codClienteVi;
			$arrayVi['loopVi']["$codClienteVi"]['clienteVi'] = '';
			$arrayVi['loopVi']["$codClienteVi"]['docClienteVi'] = '';
			$arrayVi['loopVi']["$codClienteVi"]['totalVi'] = 0;
			$arrayVi['loopVi']["$codClienteVi"]['loopVi'] = array();

		}

		$arrayVi['totalVi']++;
		$arrayVi['loopVi']["$codClienteVi"]['totalVi']++;
		array_push(
			$arrayVi['loopVi']["$codClienteVi"]['loopVi'],
			array(
				'idVi' => $idVi,
				'codVi' => $codVi,
				'codClienteVi' => $codClienteVi,
				'clienteVi' => $clienteVi,
				'docClienteVi' => $docClienteVi,
				'NameVi' => $NameVi,
				'AddressVi' => $AddressVi,
				'CodeVi' => $CodeVi,
				'PositionTimeVi' => $PositionTimeVi,
				'PositionTimeViBr' => $PositionTimeViBr,
				'codVgVi' => $codVgVi,
			)
		);

		if (strlen($codClienteVi) > 0){

			array_push(
				$codsClienteVi,
				"'$codClienteVi'"
			);

		}

	}while($rowsVi = mysqli_fetch_assoc($queryVi));

	#PROCESSO DE CLIENTES ==
	$codsClienteVi = array_unique($codsClienteVi);
	$codsClienteVi = join(",", $codsClienteVi);

	if (strlen($codsClienteVi) > 0){

		#CONSULTAR TABELA DE CLIENTES ==
		$queryCa = mysqli_query($conectBdEp, "
			SELECT * FROM
				clientes
			WHERE
				codCa IN($codsClienteVi) 
		") or die(mysql_error($conectBdEp));
		$rowsCa = mysqli_fetch_assoc($queryCa);
		$totalCa = mysqli_num_rows($queryCa);

		$arrayCa = array();
		$arrayCa['totalCa'] = 0;
		$arrayCa['loopCa'] = array();

		if ($totalCa > 0){

			do {


				$codCa = $rowsCa['codCa'];
				$clienteCa = $rowsCa['clienteCa'];
				$docCa = $rowsCa['docCa'];

				$arrayCa['totalCa']++;
				$arrayCa['loopCa']["$codCa"]['codCa'] = $codCa;
				$arrayCa['loopCa']["$codCa"]['clienteCa'] = $clienteCa;
				$arrayCa['loopCa']["$codCa"]['docCa'] = $docCa;

			}while($rowsCa = mysqli_fetch_assoc($queryCa));

		}

	}

	#SETAR DADOS DO $arrayVi ==

	if($arrayVi['totalVi'] > 0){

		foreach ($arrayVi['loopVi'] as $keyVi => $rowsVi) {

			$codClienteVi = $rowsVi['codClienteVi'];

			if(isset($arrayCa['loopCa']["$codClienteVi"])){

				$clienteCa = $arrayCa['loopCa']["$codClienteVi"]['clienteCa'];
				$docCa = $arrayCa['loopCa']["$codClienteVi"]['docCa'];

				$arrayVi['loopVi']["$keyVi"]['clienteVi'] = $clienteCa;
				$arrayVi['loopVi']["$keyVi"]['docClienteVi'] = $docCa;

			}

			#LISTA DE VEICULOS DO CLIENTE ==
			if($rowsVi['totalVi'] > 0){

				foreach ($rowsVi['loopVi'] as $keyViLp => $rowsViLp){

					$codVi = $rowsViLp['codVi'];
					$codClienteVi = $rowsViLp['codClienteVi'];
					$PositionTimeVi = $rowsViLp['PositionTimeVi'];
					$codVgVi = $rowsViLp['codVgVi'];

					#SETAR CLIENTES ==
					if(isset($arrayCa['loopCa']["$codClienteVi"])){

						$clienteCa = $arrayCa['loopCa']["$codClienteVi"]['clienteCa'];
						$docCa = $arrayCa['loopCa']["$codClienteVi"]['docCa'];

						$arrayVi['loopVi']["$keyVi"]['loopVi']["$keyViLp"]['clienteVi'] = $clienteCa;
						$arrayVi['loopVi']["$keyVi"]['loopVi']["$keyViLp"]['docClienteVi'] = $docCa;

					}

					#SETAR VIAGEM ==
					if(isset($arrayVg['loopVg']["$codVi"])){

						$codVgVi = $arrayVg['loopVg']["$codVi"]['codVg'];

						$arrayVi['loopVi']["$keyVi"]['loopVi']["$keyViLp"]['codVgVi'] = $codVgVi;

					}

					#PROCESSAR EQUIPAMENTOS SEM COMUNICAÇÃO ==
					$arraySc['totalSc']++;
					array_push(
						$arraySc['loopSc'],
						array(
							'codClienteSc' => $codClienteVi,
							'codViSc' => $codVi,
							'codVgSc' => $codVgVi,
							'positionTimeViSc' => $PositionTimeVi,
						)
					);

				}

			}

		}

	}

}

#SALVAR EQUIPAMENTOS SEM COMUNICAÇÃO ==
if($arraySc['totalSc'] > 0){

	foreach ($arraySc['loopSc'] as $keySc => $rowsSc){

		$codClienteSc = $rowsSc['codClienteSc'];
		$codViSc = $rowsSc['codViSc'];
		$codVgSc = $rowsSc['codVgSc'];
		$positionTimeViSc = $rowsSc['positionTimeViSc'];

		#CONSULTAR TABELA DE VIAGENS ==
		$querySc = mysqli_query($conectBdEp, "
			SELECT * FROM
				histEquipSemComunic
			WHERE
				codClienteSc = '$codClienteSc' AND 
				codViSc = '$codViSc' AND 
				codVgSc = '$codVgSc' AND 
				positionTimeViSc = '$positionTimeViSc'
		") or die(mysql_error($conectBdEp));
		$rowsSc = mysqli_fetch_assoc($querySc);
		$totalSc = mysqli_num_rows($querySc);

		if($totalSc == 0){

			$codSc = uniqid();

			#SALVAR DADOS ==
			mysqli_query($conectBdEp, "
				INSERT INTO
					histEquipSemComunic
						(
							codSc,
							codClienteSc,
							codViSc,
							codVgSc,
							positionTimeViSc
						)
					VALUES(
							'$codSc',
							'$codClienteSc',
							'$codViSc',
							'$codVgSc',
							'$positionTimeViSc'
						)
			") or die(mysql_error($conectBdEp));

		}
	}

}

#HTML ==

echo '<pre>';
print_r($arraySc);
print_r($arrayVi);

$htmlEp = '';

if ($arrayVi['totalVi'] > 0) {

	foreach($arrayVi['loopVi'] as $keyVi => $rowsVi){

		$clienteVi = $rowsVi['clienteVi'];
		$docClienteVi = $rowsVi['docClienteVi'];
		$totalVi = $rowsVi['totalVi'];
		$loopVi = $rowsVi['loopVi'];

		$htmlEp .= '<div>';
		$htmlEp .= '<h2>'.$clienteVi.'</h2>';

		if ($totalVi > 0){

			$htmlEp .= '<table cellpadding="0" cellspacing="0" border="1" width="100%">';
			$htmlEp .= '<tr>';
			$htmlEp .= '<td>Veiculo/Equipamento</td>';
			$htmlEp .= '<td width="120">Address</td>';
			$htmlEp .= '<td width="120">Code</td>';
			$htmlEp .= '<td width="160">Última posição</td>';
			$htmlEp .= '</tr>';

			foreach ($loopVi as $keyViLp => $rowsViLp){

				$NameVi = $rowsViLp['NameVi'];
				$AddressVi = $rowsViLp['AddressVi'];
				$CodeVi = $rowsViLp['CodeVi'];
				$PositionTimeViBr = $rowsViLp['PositionTimeViBr'];

				$htmlEp .= '<tr>';
				$htmlEp .= '<td>'.$NameVi.'</td>';
				$htmlEp .= '<td>'.$AddressVi.'</td>';
				$htmlEp .= '<td>'.$CodeVi.'</td>';
				$htmlEp .= '<td>'.$PositionTimeViBr.'</td>';
				$htmlEp .= '</tr>';

			}

			$htmlEp .= '</table>';

		}

		$htmlEp .= '</div>';


	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<div>
		<h1>Equipamentos sem comunicação no intervalo de 30 dias</h1>
	</div>

	<?=$htmlEp;?>

</body>
</html>