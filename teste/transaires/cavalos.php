<?php

#REQUIRES ==
require_once "./conect.php";

#VARIÁVEIS ==
$codClienteVi = $codClienteEp;
$codClienteCaCf = $codClienteVi;

#VARIÁVEIS SECUNDÁRIAS ==
$loopMaVi = array();
$loopCorVi = array();
$loopTipoVi = array();
$loopCarroceriaVi = array();
$loopVi = array();
$dirEp = './';
$loopAq = array(
	'cavalos.csv'
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

			$placaVi = trim($arrayLnAqEp[0]);

			$codVi = substr(md5("$placaVi"), 0, 30);
			
			#MARCAS ==			
			$tituloMarcaVi = trim($arrayLnAqEp[1]);

			if(preg_match('(SCANIA)', $tituloMarcaVi)){
				$tituloMarcaVi = 'SCANIA';
			} elseif(preg_match('(VOLVO)', $tituloMarcaVi)){
				$tituloMarcaVi = 'VOLVO';
			} elseif(preg_match('(DAF)', $tituloMarcaVi)){
				$tituloMarcaVi = 'DAF';
			} elseif(preg_match('(VW)', $tituloMarcaVi)){
				$tituloMarcaVi = 'VW';
			}

			$codMarcaVi = substr(md5("$tituloMarcaVi"), 0, 30);
			
			if(!isset($loopMaVi["$codMarcaVi"])){
				$loopMaVi["$codMarcaVi"]['tipoCf'] = 'marcaVi';
				$loopMaVi["$codMarcaVi"]['codCf'] = $codMarcaVi;
				$loopMaVi["$codMarcaVi"]['tituloCf'] = $tituloMarcaVi;
				$loopMaVi["$codMarcaVi"]['codClienteCaCf'] = $codClienteCaCf;
			}

			#FIM PROCESSO MARCAS ==
			
			$frotaVi = $classEp->escapaCaracteresEp(utf8_decode(trim($arrayLnAqEp[2])));
			$anoVi = trim($arrayLnAqEp[3]);
			$chassiVi = trim($arrayLnAqEp[4]);

			#PROCESSAR COR ==
			$tituloCorVi = trim($arrayLnAqEp[7]);
			$codCorVi = substr(md5("$tituloCorVi"), 0, 30);

			if(!isset($loopCorVi["$codCorVi"])){
				$loopCorVi["$codCorVi"]['tipoCf'] = 'corVi';
				$loopCorVi["$codCorVi"]['codCf'] = $codCorVi;
				$loopCorVi["$codCorVi"]['tituloCf'] = $tituloCorVi;
				$loopCorVi["$codCorVi"]['codClienteCaCf'] = $codClienteCaCf;
			}

			#FIM PROCESSO COR ==

			#PROCESSAR TIPO DE VEÍCULO ==
			$tituloTipoVi = trim($arrayLnAqEp[5]);
			$codTipoVi = substr(md5("$tituloTipoVi"), 0, 30);

			if(!isset($loopTipoVi["$codTipoVi"])){
				$loopTipoVi["$codTipoVi"]['tipoCf'] = 'tipoVi';
				$loopTipoVi["$codTipoVi"]['codCf'] = $codTipoVi;
				$loopTipoVi["$codTipoVi"]['tituloCf'] = $tituloTipoVi;
				$loopTipoVi["$codTipoVi"]['codClienteCaCf'] = $codClienteCaCf;
			}

			#FIM PROCESSO TIPO DE VEÍCULO ==

			#PROCESSAR CARROCERIA ==
			$tituloCarroceriaVi = trim($arrayLnAqEp[5]);
			$codCarroceriaVi = substr(md5("carr$tituloCarroceriaVi"), 0, 30);

			if(!isset($loopCarroceriaVi["$codCarroceriaVi"])){
				$loopCarroceriaVi["$codCarroceriaVi"]['tipoCf'] = 'tipoCarroceriaVi';
				$loopCarroceriaVi["$codCarroceriaVi"]['codCf'] = $codCarroceriaVi;
				$loopCarroceriaVi["$codCarroceriaVi"]['tituloCf'] = $tituloCarroceriaVi;
				$loopCarroceriaVi["$codCarroceriaVi"]['codClienteCaCf'] = $codClienteCaCf;
			}

			#FIM PROCESSO CARROCERIA ==

			#CIDADE ESTADO ==
			$cidadeEstadoVi = trim($arrayLnAqEp[8]);
			$cidadeEstadoViArray = explode('-', $cidadeEstadoVi);
			$cidadePlacaVi = $classEp->escapaCaracteresEp(utf8_decode(trim($cidadeEstadoViArray[0])));
			
			$estadoPlacaVi = '';
			if(isset($cidadeEstadoViArray[1])){
				$estadoPlacaVi = trim($cidadeEstadoViArray[1]);
			}
			
			#TIPO DE VEICULO ==
			$tpVeiculoRegVi = 'cavalinho';

			array_push(
				$loopVi,
				array(
					'codVi'=>$codVi,
					'tpVeiculoRegVi'=>$tpVeiculoRegVi,
					'placaVi'=>$placaVi,
					'codMarcaVi'=>$codMarcaVi,
					'tituloMarcaVi'=>$tituloMarcaVi,
					'codTipoVi'=>$codTipoVi,
					'tituloTipoVi'=>$tituloTipoVi,
					'codTpCarroceriaVi'=>$codCarroceriaVi,
					'tituloTpCarroceriaVi'=>$tituloCarroceriaVi,
					'codCorVi'=>$codCorVi,
					'tituloCorVi'=>$tituloCorVi,
					'frotaVi'=>$frotaVi,
					'anoVi'=>$anoVi,
					'chassiVi'=>$chassiVi,
					'cidadePlacaVi'=>$cidadePlacaVi,
					'estadoPlacaVi'=>$estadoPlacaVi,
					'codClienteVi'=>$codClienteVi
				)
			);

		}

	} else {
		echo '<h1>NÃO EXISTE</h1>';
	}

	#PROCESSAR LOOPS ==
	insertVeiculoVi($loopVi, $conectBdEp);
	processarInsertCf($loopMaVi, $conectBdEp);
	processarInsertCf($loopCarroceriaVi, $conectBdEp);
	processarInsertCf($loopTipoVi, $conectBdEp);
	processarInsertCf($loopCorVi, $conectBdEp);

	echo '<pre>';
	print_r($loopVi);
	print_r($loopCarroceriaVi);
	print_r($loopTipoVi);
	print_r($loopCorVi);
	print_r($loopMaVi);

}

?>