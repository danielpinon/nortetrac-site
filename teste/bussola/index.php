<?php

#REQUIRES ==
require_once "./conect.php";

#VARIÁVEIS ==
$codClienteVi = '633fb81622464';
$codClienteCaCf = $codClienteVi;

$loopMaVi = array();
$loopVi = array();
$dirEp = './';
$loopAq = array(
	'frota.csv'
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

			$placaVi = trim($arrayLnAqEp[1]);

			$codVi = substr(md5("$placaVi"), 0, 30);
			
			$tituloMarcaVi = trim($arrayLnAqEp[2]);
			$codMarcaVi = substr(md5("$tituloMarcaVi"), 0, 30);
			
			$frotaVi = trim($arrayLnAqEp[3]);
			$anoVi = trim($arrayLnAqEp[4]);
			$chassiVi = trim($arrayLnAqEp[5]);

			if(preg_match('(SCANIA|VOLVO|IVECO|MERCEDES-BENZ|MERCEDES-BENZ|VOLVO DO BRASIL|VOLKS|FORD)', $tituloMarcaVi)){
				$tpVeiculoRegVi = 'cavalinho';
			} else {
				$tpVeiculoRegVi = 'carreta';
			}

			array_push(
				$loopVi,
				array(
					'codVi'=>$codVi,
					'tpVeiculoRegVi'=>$tpVeiculoRegVi,
					'placaVi'=>$placaVi,
					'codMarcaVi'=>$codMarcaVi,
					'tituloMarcaVi'=>$tituloMarcaVi,
					'frotaVi'=>$frotaVi,
					'anoVi'=>$anoVi,
					'chassiVi'=>$chassiVi,
					'codClienteVi'=>$codClienteVi
				)
			);

			if(!isset($loopMaVi["$codMarcaVi"])){
				$loopMaVi["$codMarcaVi"]['codMa'] = $codMarcaVi;
				$loopMaVi["$codMarcaVi"]['tituloMa'] = $tituloMarcaVi;
			}

			#echo '<pre>';
			#print_r($lnAqEp);

		}

	} else {
		echo '<h1>NÃO EXISTE</h1>';
	}

	#LOOP DE MARCA ==
	foreach($loopMaVi as $rowMa){

		#RETORNAR DADOS ==
		$codMa = $rowMa['codMa'];
		$tituloMa = $rowMa['tituloMa'];

		#CONVERTER DADOS ==
		$codCf = $codMa;
		$tipoCf = 'marcaVi';
		$tituloCf = $tituloMa;

		#CONSULTAR DADOS ==
		$queryCf = mysqli_query($conectBdEp, "
			SELECT * FROM
				ATVClienteCf
			WHERE
				codCf='$codCf' AND
				codClienteCaCf='$codClienteCaCf'
		") or die(mysqli_error($conectBdEp));
		$totalCf = mysqli_num_rows($queryCf);

		if($totalCf == 0){

			mysqli_query($conectBdEp, "
				INSERT INTO
					ATVClienteCf
					(
						codCf,
						tipoCf,
						tituloCf,
						codClienteCaCf
					)
					VALUES
					(
						'$codCf',
						'$tipoCf',
						'$tituloCf',
						'$codClienteCaCf'
					)
			") or die(mysqli_error($conectBdEp));

		} else {



		}

	}

	#LOOP DE VEÍCULOS ==
	foreach($loopVi as $rowVi){
		
		$codVi = $rowVi['codVi'];
		$tpVeiculoRegVi = $rowVi['tpVeiculoRegVi'];
		$placaVi = $rowVi['placaVi'];
		$codMarcaVi = $rowVi['codMarcaVi'];
		$tituloMarcaVi = $rowVi['tituloMarcaVi'];
		$frotaVi = $rowVi['frotaVi'];
		$anoVi = $rowVi['anoVi'];
		$chassiVi = $rowVi['chassiVi'];
		$codClienteVi = $rowVi['codClienteVi'];

		#CONSULTAR DADOS ==
		$queryVi = mysqli_query($conectBdEp, "
			SELECT * FROM
				ATVClienteVi
			WHERE
				codVi='$codVi' AND
				codClienteVi='$codClienteVi'
		") or die(mysqli_error($conectBdEp));
		$totalVi = mysqli_num_rows($queryVi);

		if($totalVi == 0){

			mysqli_query($conectBdEp, "
				INSERT INTO
					ATVClienteVi
					(
						codVi,
						tpVeiculoRegVi,
						codMarcaVi,
						frotaVi,
						anoVi,
						chassiVi,
						codClienteVi,
						placaVi
					)
					VALUES
					(
						'$codVi',
						'$tpVeiculoRegVi',
						'$codMarcaVi',
						'$frotaVi',
						'$anoVi',
						'$chassiVi',
						'$codClienteVi',
						'$placaVi'
					)
			") or die(mysqli_error($conectBdEp));

		} else {

			mysqli_query($conectBdEp, "
				UPDATE ATVClienteVi SET
					placaVi='$placaVi',
					codMarcaVi='$codMarcaVi'
				WHERE
					codVi='$codVi' AND
					codClienteVi='$codClienteVi'
			") or die(mysqli_error($conectBdEp));

		}

	}

	echo '<pre>';
	print_r($loopMaVi);

}

?>