<?php
exit();
#REQUIRES ==
require_once "./conect.php";

function cmpMessageTimeAlStrtotime($a, $b) {
	return $a['MessageTimeAlStrtotime'] < $b['MessageTimeAlStrtotime'];
}

function processarLatLong($valor){

	$resultado = '';

	$valor_array = explode(' ', $valor);

	if(count($valor_array) > 0){

		$grau = preg_replace('/[^0-9]/', '', $valor_array[0]);
		
		$minutos = 0;
		if(isset($valor_array[1])){
			$minutos = preg_replace('/[^0-9]/', '', $valor_array[1]);
		}

		$segundos = 0;
		if(isset($valor_array[2])){
			$segundos = preg_replace('/[^0-9]/', '', $valor_array[2]);
		}

		$sentido = '';
		if(isset($valor_array[3])){
			$sentido = substr($valor_array[3], 0, 1);
		}

		$condicional = '1';
		if($sentido == 'S'){
			$condicional = '-1';
		} elseif($sentido == 'O'){
			$condicional = '-1';
		} else {
			$condicional = '1';
		}

		if(strlen($segundos) == 0){
			echo 'oks'.$valor;
		}

		$posicao = 0;
		if($segundos != 0){
			$posicao = ((($segundos/60)+$minutos)/60+$grau)*$condicional;
		}

		$resultado = $posicao;

	}

	if(strlen($resultado) == 0){
		$resultado = $valor;		
	}

	return $resultado;

}

#VARIÁVEIS ==
$loopCa = array();
$dirEp = './excel/arquivos/';

$loopAq = scandir($dirEp);

$loopAl = array();
$loopAlPs = array();
$loopAlPsGp = array();
$loopAlPsGp2 = array();
$loopVi = array();
$i = 0;

#VEICULOS ==
$queryVi = mysqli_query($conectBdEp, "
	SELECT * FROM
		veiculos
") or die(mysqli_error($conectBdEp));
$rowVi = mysqli_fetch_assoc($queryVi);
$totalVi = mysqli_num_rows($queryVi);

$loopViNameVi = array();

do{

	$codVi = $rowVi['codVi'];
	$NameVi = utf8_encode(trim($rowVi['NameVi']));
	$codViNameVi = substr(md5("$NameVi"), 0, 20);
	$AddressVi = utf8_encode($rowVi['AddressVi']);
	$CodeVi = utf8_encode($rowVi['CodeVi']);
	$AccountNumberVi = utf8_encode($rowVi['AccountNumberVi']);
	$codContaVi = utf8_encode($rowVi['codContaVi']);

	if(isset($loopViNameVi["$codViNameVi"])){
		$loopViNameVi["$codViNameVi"] = array();
	}

	$loopViNameVi["$codViNameVi"]['codVi'] = $codVi;
	$loopViNameVi["$codViNameVi"]['NameVi'] = $NameVi;
	$loopViNameVi["$codViNameVi"]['codViNameVi'] = $codViNameVi;
	$loopViNameVi["$codViNameVi"]['AddressVi'] = $AddressVi;
	$loopViNameVi["$codViNameVi"]['CodeVi'] = $CodeVi;
	$loopViNameVi["$codViNameVi"]['AccountNumberVi'] = $AccountNumberVi;
	$loopViNameVi["$codViNameVi"]['codContaVi'] = $codContaVi;

}while($rowVi = mysqli_fetch_assoc($queryVi));

foreach($loopAq as $nomeAqEp){

	if($i > 1){

		$srcAqEp = $dirEp.$nomeAqEp;

		#CHECAR SE O ARQUIVO EXISTE ==
		if(file_exists($srcAqEp)){

			if($nomeAqEp == 'posicoes-excel.csv'){

				#PROCESSAR OUTROS ARQUIVOS ==
				$lnsAqEp = file($srcAqEp);
				$p = 0;

				foreach($lnsAqEp as $lnEp){

					$infoLnEp = trim($lnEp);

					if($p > 0){

						$colsEp = explode(';', $infoLnEp);

						$nomeViPs = trim($colsEp[0]);
						$contaViPs = trim($colsEp[2]);
						
						#TIME RECEIVE ==
						$timeReceivePs = trim($colsEp[4]);
						$timeReceivePsArray = explode(' ', $timeReceivePs);

						$dataPs = $timeReceivePsArray[0];
						$horaPs = '00:00';
						if(isset($timeReceivePsArray[1])){
							$horaPs = $timeReceivePsArray[1];
						}

						$timeReceivePs = $classEp->converterDataEp($dataPs, 'en');
						$timeReceivePs .= ' ';
						$timeReceivePs .= $horaPs;
						
						#TIME ==
						$timePs = trim($colsEp[6]);
						$timePsArray = explode(' ', $timePs);

						$dataPs = $timePsArray[0];
						$horaPs = '00:00';
						if(isset($timePsArray[1])){
							$horaPs = $timePsArray[1];
						}
						
						$timePs = $classEp->converterDataEp($dataPs, 'en');
						$timePs .= ' ';
						$timePs .= $horaPs;

						#TIME GRUPO ==
						$codGpPs = $classEp->converterDataEp($dataPs, 'en');
						$codGpPs .= '-';
						$codGpPs .= substr($horaPs, 0, 5);
						
						#LIGADO/DESLIGADO ==
						$ligadoDesligadoPs = trim($colsEp[8]);

						#LATITUDE ==
						$latitudePsOrig = trim($colsEp[9]);
						$latitudePs = processarLatLong($latitudePsOrig);

						#LONGITUDE ==
						$longitudePsOrig = trim($colsEp[10]);
						$longitudePs = processarLatLong($longitudePsOrig);

						#INFORMAÇÕES DOS VEICULOS ==
						$codViPs = substr(md5("$nomeViPs"), 0, 20);
						$codViPsBd = '';
						$AddressViPsBd = '';
						$CodeViPsBd = '';
						$codContaViPsBd = '';

						if(isset($loopViNameVi["$codViPs"]['codVi'])){
							$codViPsBd = $loopViNameVi["$codViPs"]['codVi'];
						}

						if(!isset($loopVi["$codViPs"])){

							if($totalVi > 0){

								$codVi = $rowVi['codVi'];
								$codViPsBd = $codVi;
								$AddressViPsBd = $rowVi['AddressVi'];
								$CodeViPsBd = $rowVi['CodeVi'];
								$AccountNumberViPsBd = $rowVi['AccountNumberVi'];
								$codContaViPsBd = $rowVi['codContaVi'];

								$loopVi["$codViPs"]['codVi'] = $codVi;
								$loopVi["$codViPs"]['AddressVi'] = $AddressViPsBd;
								$loopVi["$codViPs"]['CodeVi'] = $CodeViPsBd;
								$loopVi["$codViPs"]['AccountNumberVi'] = $AccountNumberViPsBd;
								$loopVi["$codViPs"]['codContaVi'] = $codContaViPsBd;

							}

						} else {

							$codViPsBd = '';
							if(isset($loopViNameVi["$codViPs"]['codVi'])){
								$codViPsBd = $loopViNameVi["$codViPs"]['codVi'];	
							}
							
							$AddressViPsBd = '';
							if(isset($loopViNameVi["$codViPs"]['AddressVi'])){
								$AddressViPsBd = $loopViNameVi["$codViPs"]['AddressVi'];	
							}
							
							$CodeViPsBd = '';
							if(isset($loopViNameVi["$codViPs"]['CodeVi'])){
								$CodeViPsBd = $loopViNameVi["$codViPs"]['CodeVi'];	
							}
							
							$AccountNumberViPsBd = '';
							if(isset($loopViNameVi["$codViPs"]['AccountNumberVi'])){
								$AccountNumberViPsBd = $loopViNameVi["$codViPs"]['AccountNumberVi'];	
							}
							
							$codContaViPsBd = '';
							if(isset($loopViNameVi["$codViPs"]['codContaVi'])){
								$codContaViPsBd = $loopViNameVi["$codViPs"]['codContaVi'];
							}
							
						}

						array_push(
							$loopAlPs,
							array(
								'codViPs'=>$codViPs,
								'codViPsBd'=>$codViPsBd,
								'nomeViPs'=>$nomeViPs,
								'AddressViPsBd'=>$AddressViPsBd,
								'CodeViPsBd'=>$CodeViPsBd,
								'codContaViPsBd'=>$codContaViPsBd,
								'AccountNumberViPsBd'=>$AccountNumberViPsBd,
								'contaViPs'=>$contaViPs,
								'timeReceivePs'=>$timeReceivePs,
								'timePs'=>$timePs,
								'ligadoDesligadoPs'=>$ligadoDesligadoPs,
								'latitudePs'=>$latitudePs,
								'latitudePsOrig'=>$latitudePsOrig,
								'longitudePs'=>$longitudePs,
								'longitudePsOrig'=>$longitudePsOrig
							)
						);

						if(!isset($loopAlPsGp["$codGpPs"])){
							$loopAlPsGp["$codGpPs"] = array();
						}

						array_push(
							$loopAlPsGp["$codGpPs"],
							array(
								'codGpPs'=>$codGpPs,
								'codViPs'=>$codViPs,
								'codViPsBd'=>$codViPsBd,
								'AddressViPsBd'=>$AddressViPsBd,
								'CodeViPsBd'=>$CodeViPsBd,
								'AccountNumberViPsBd'=>$AccountNumberViPsBd,
								'codContaViPsBd'=>$codContaViPsBd,
								'nomeViPs'=>$nomeViPs,
								'latitudePs'=>$latitudePs,
								'longitudePs'=>$longitudePs,
								'timePs'=>$timePs
							)
						);

					}

					$p++;

				}

			} elseif(preg_match('(posicoes)', $nomeAqEp)){

				#PROCESSAR OUTROS ARQUIVOS ==
				$lnsAqEp = file($srcAqEp);
				
				$priRegLnEp = 'DOM FRANCISCO IV (368624)';
				$sufixoRegLnEp = 'A XIV';
				$ultimoRegLnEp = 'ICALTDAME0137';
				
				$l = 0;
				$priLpEp = 0;
				
				foreach($lnsAqEp as $lnEp){

					$infoLnEp = trim($lnEp);

					if(preg_match('(DOM FRANCISCO IV (368624))', $infoLnEp)){

						$somaEp = 0;
						$somaEp2 = 0;
						if($priLpEp == 0){
							$priLpEp++;
						} else {
							$somaEp = -1;
							$somaEp2 = 0;
						}

						#DATA RECEIVE ==
						$dataPs = trim($lnsAqEp[($l+1+$somaEp2)]);
						$horaPs = trim($lnsAqEp[($l+11+$somaEp)]);

						$timeReceivePs = $classEp->converterDataEp($dataPs, 'en');
						$timeReceivePs .= ' ';
						$timeReceivePs .= $horaPs;

						#DATA TIME ==
						$dataPs = trim($lnsAqEp[($l+2+$somaEp)]);
						$horaPs = trim($lnsAqEp[($l+12+$somaEp)]);

						$timePs = $classEp->converterDataEp($dataPs, 'en');
						$timePs .= ' ';
						$timePs .= $horaPs;
						echo $l.' '.$timeReceivePs.' '.$timePs;
						echo '<br>';
						#TIME GRUPO ==
						$codGpPs = $classEp->converterDataEp($dataPs, 'en');
						$codGpPs .= '-';
						$codGpPs .= substr($horaPs, 0, 5);

						#TIME GRUPO ==
						$codGpPs2 = $classEp->converterDataEp($dataPs, 'en');
						$codGpPs2 .= '-';
						$codGpPs2 .= substr($horaPs, 0, 4);

						#IFÉN ==
						$existeIfenEp = 0;
						$incremento = 0;
						if(trim($lnsAqEp[($l+9)]) == '-'){
							$existeIfenEp = 1;
							$incremento = 1;
						}

						#LIGADO DESLIGADO ==
						$ligadoDesligadoPs = trim($lnsAqEp[($l+4)]);

						#LATITUDE ==
						$latitudePsOrig = trim($lnsAqEp[($l+5)]);
						$latitudePsOrig = str_replace(
							array(
								' ',
								"°"
							),
							array(
								'',
								'° '
							),
							$latitudePsOrig
						);
						
						$latitudePsOrigSufixo = '';
						if(isset($lnsAqEp[($l+14)])){
							
							$latitudePsOrigSufixo = trim($lnsAqEp[($l+$incremento+14)]);
							$latitudePsOrigSufixo = str_replace(
								array(
									"'",
									' ',
									'"'
								),
								array(
									'"',
									'',
									'" '
								),
								$latitudePsOrigSufixo
							);

						}

						$latitudePsOrig .= ' '.$latitudePsOrigSufixo;
						$latitudePs = processarLatLong($latitudePsOrig);

						#LONGITUDE ==
						$longitudePsOrig = trim($lnsAqEp[($l+6)]);
						$longitudePsOrig = str_replace(
							array(
								' ',
								"°"
							),
							array(
								'',
								'° '
							),
							$longitudePsOrig
						);

						$longitudePsOrigSufixo = '';
						if(isset($lnsAqEp[($l+14)])){
							
							$longitudePsOrigSufixo = trim($lnsAqEp[($l+14)]);
							
							#VERIFICAÇÃO 1 ==
							if(!preg_match('(Oeste|oeste)', $longitudePsOrigSufixo)){
								$longitudePsOrigSufixo = trim($lnsAqEp[($l+15)]);
							}

							$longitudePsOrigSufixo = str_replace(
								array(
									"'",
									' ',
									'"'
								),
								array(
									'"',
									'',
									'" '
								),
								$longitudePsOrigSufixo
							);

						}

						$longitudePsOrig .= ' '.$longitudePsOrigSufixo;

						$longitudePs = processarLatLong($longitudePsOrig);

					} elseif($infoLnEp == $ultimoRegLnEp){

						if(!isset($codViPs)){
							$codViPs = '';
						}

						if(!isset($codViPsBd)){
							$codViPsBd = '';
						}

						if(!isset($AddressViPsBd)){
							$AddressViPsBd = '';
						}

						if(!isset($CodeViPsBd)){
							$CodeViPsBd = '';
						}

						if(!isset($codContaViPsBd)){
							$codContaViPsBd = '';
						}

						if(!isset($AccountNumberViPsBd)){
							$AccountNumberViPsBd = '';
						}

						if(!isset($contaViPs)){
							$contaViPs = '';
						}
						
						if(!isset($timeReceivePs)){
							$timeReceivePs = '';
						}

						if(!isset($timePs)){
							$timePs = '';
						}

						if(!isset($ligadoDesligadoPs)){
							$ligadoDesligadoPs = '';
						}
						
						if(!isset($latitudePs)){
							$latitudePs = '';
						}

						if(!isset($latitudePsOrig)){
							$latitudePsOrig = '';
						}

						if(!isset($longitudePs)){
							$longitudePs = '';
						}

						if(!isset($longitudePsOrig)){
							$longitudePsOrig = '';
						}

						array_push(
							$loopAlPs,
							array(
								'codViPs'=>$codViPs,
								'codViPsBd'=>$codViPsBd,
								'nomeViPs'=>$nomeViPs,
								'AddressViPsBd'=>$AddressViPsBd,
								'CodeViPsBd'=>$CodeViPsBd,
								'codContaViPsBd'=>$codContaViPsBd,
								'AccountNumberViPsBd'=>$AccountNumberViPsBd,
								'contaViPs'=>$contaViPs,
								'timeReceivePs'=>$timeReceivePs,
								'timePs'=>$timePs,
								'ligadoDesligadoPs'=>$ligadoDesligadoPs,
								'latitudePs'=>$latitudePs,
								'latitudePsOrig'=>$latitudePsOrig,
								'longitudePs'=>$longitudePs,
								'longitudePsOrig'=>$longitudePsOrig
							)
						);

						if(!isset($loopAlPsGp["$codGpPs"])){
							$loopAlPsGp["$codGpPs"] = array();
						}

						array_push(
							$loopAlPsGp["$codGpPs"],
							array(
								'codGpPs'=>$codGpPs,
								'codViPs'=>$codViPs,
								'codViPsBd'=>$codViPsBd,
								'AddressViPsBd'=>$AddressViPsBd,
								'CodeViPsBd'=>$CodeViPsBd,
								'AccountNumberViPsBd'=>$AccountNumberViPsBd,
								'codContaViPsBd'=>$codContaViPsBd,
								'nomeViPs'=>$nomeViPs,
								'latitudePs'=>$latitudePs,
								'longitudePs'=>$longitudePs,
								'timePs'=>$timePs
							)
						);

						if(!isset($loopAlPsGp2["$codGpPs2"])){
							$loopAlPsGp2["$codGpPs2"] = array();
						}

						array_push(
							$loopAlPsGp2["$codGpPs2"],
							array(
								'codGpPs'=>$codGpPs,
								'codViPs'=>$codViPs,
								'codViPsBd'=>$codViPsBd,
								'AddressViPsBd'=>$AddressViPsBd,
								'CodeViPsBd'=>$CodeViPsBd,
								'AccountNumberViPsBd'=>$AccountNumberViPsBd,
								'codContaViPsBd'=>$codContaViPsBd,
								'nomeViPs'=>$nomeViPs,
								'latitudePs'=>$latitudePs,
								'longitudePs'=>$longitudePs,
								'timePs'=>$timePs
							)
						);

					}

					$l++;

				}

			} else {

				#PROCESSAR OUTROS ARQUIVOS ==
				$lnsAqEp = file($srcAqEp);
				$l = 0;

				foreach($lnsAqEp as $lnEp){

					$infoLnEp = trim($lnEp);

					if($infoLnEp == 'Histórico de consolidado de alertas de OBC'){

						#$codAl = uniqid();
						#$codAl = substr(md5("$infoLnEp"), 0, 20);

					} elseif($infoLnEp == 'Data de criação da mensagem'){

						$MessageTimeAlArray = explode(' ', trim($lnsAqEp[($l+1)]));
						$dataAl = $classEp->converterDataEp($MessageTimeAlArray[0], 'en');
						
						$horaAl = '';
						if(isset($MessageTimeAlArray[1])){
							$horaAl = $MessageTimeAlArray[1];
						}

						$MessageTimeAl = $dataAl.' '.$horaAl;
						$MessageTimeAlStrtotime = strtotime("$MessageTimeAl");
						$PositionTimeAl = $MessageTimeAl;

						$codAl = substr(md5("$MessageTimeAl"), 0, 20);

					} elseif($infoLnEp == 'Posição'){

						$LandmarkAl = trim($lnsAqEp[($l+1)]);
						#$codAl = uniqid();
						#$codAl = substr(md5("$infoLnEp"), 0, 20);

					} elseif($infoLnEp == 'Ignição'){

						$IgnitionAl = trim($lnsAqEp[($l+1)]);
						$IgnitionAl = str_replace(
							array(
								'Ligada',
								'Desligada'
							),
							array(
								'1', 
								'2'
							),
							$IgnitionAl
						);
						#$codAl = uniqid();
						#$codAl = substr(md5("$infoLnEp"), 0, 20);

					} elseif($infoLnEp == 'Velocidade'){

						$SpeedAlArray = explode(' ', trim($lnsAqEp[($l+5)]));
						$SpeedAl = preg_replace('/\D/', '', $SpeedAlArray[0]);
						$SpeedAl = substr($SpeedAl, 0, (strlen($SpeedAl)-2));

					} elseif($infoLnEp == 'RPM'){

						$RPMAlArray = explode(' ', trim($lnsAqEp[($l+5)]));
						$RPMAl = preg_replace('/\D/', '', $RPMAlArray[0]);

					} elseif($infoLnEp == 'Hodômetro'){

						$HodometerAlArray = explode(' ', trim($lnsAqEp[($l+5)]));
						$HodometerAl = preg_replace('/\D/', '', $HodometerAlArray[0]);

					} elseif($infoLnEp == 'Horímetro'){

						$HourmeterAlArray = explode(' ', trim($lnsAqEp[($l+5)]));
						$HourmeterAl = preg_replace('/\D/', '', $HourmeterAlArray[0]);
						
						if(isset($codAl)){

							$AccountNumberAl = '';
							$VehicleCodeAl = '';
							$VehicleAddressAl = '';
							$codViAl = '';
							$LatitudeAl = '';
							$LongitudeAl = '';

							$codGpPsAl = substr($MessageTimeAl, 0, 16);
							$codGpPsAl = str_replace(
								array(
									' '
								),
								array(
									'-'
								),
								$codGpPsAl
							);

							$codGpPsAl2 = substr($MessageTimeAl, 0, 15);
							$codGpPsAl2 = str_replace(
								array(
									' '
								),
								array(
									'-'
								),
								$codGpPsAl2
							);

							$loopGpPsAl = array();

							$totalGpPsAl = 0;
							if(isset($loopAlPsGp["$codGpPsAl"])){

								$loopGpPsAl = $loopAlPsGp["$codGpPsAl"];
								$totalGpPsAl = 1;

								$codViAl = $loopAlPsGp["$codGpPsAl"][0]['codViPsBd'];
								$AccountNumberAl = $loopAlPsGp["$codGpPsAl"][0]['AccountNumberViPsBd'];
								$VehicleCodeAl = $loopAlPsGp["$codGpPsAl"][0]['CodeViPsBd'];
								$VehicleAddressAl = $loopAlPsGp["$codGpPsAl"][0]['AddressViPsBd'];
								$LatitudeAl = $loopAlPsGp["$codGpPsAl"][0]['latitudePs'];
								$LongitudeAl = $loopAlPsGp["$codGpPsAl"][0]['longitudePs'];

							} elseif(isset($loopAlPsGp2["$codGpPsAl2"])){

								$loopGpPsAl = $loopAlPsGp2["$codGpPsAl2"];
								$totalGpPsAl = 1;

								$codViAl = $loopAlPsGp2["$codGpPsAl2"][0]['codViPsBd'];
								$AccountNumberAl = $loopAlPsGp2["$codGpPsAl2"][0]['AccountNumberViPsBd'];
								$VehicleCodeAl = $loopAlPsGp2["$codGpPsAl2"][0]['CodeViPsBd'];
								$VehicleAddressAl = $loopAlPsGp2["$codGpPsAl2"][0]['AddressViPsBd'];
								$LatitudeAl = $loopAlPsGp2["$codGpPsAl2"][0]['latitudePs'];
								$LongitudeAl = $loopAlPsGp2["$codGpPsAl2"][0]['longitudePs'];

							}

							#FINAL DO LOOP ==
							array_push(
								$loopAl,
								array(
									'codAl'=>$codAl,
									'AccountNumberAl'=>$AccountNumberAl,
									'codViAl'=>$codViAl,
									'VehicleCodeAl'=>$VehicleCodeAl,
									'VehicleAddressAl'=>$VehicleAddressAl,
									'LandmarkAl'=>$LandmarkAl,
									'IgnitionAl'=>$IgnitionAl,
									'SpeedAl'=>$SpeedAl,
									'RPMAl'=>$RPMAl,
									'HodometerAl'=>$HodometerAl,
									'HourmeterAl'=>$HourmeterAl,
									'MessageTimeAl'=>$MessageTimeAl,
									'MessageTimeAlStrtotime'=>$MessageTimeAlStrtotime,
									'PositionTimeAl'=>$PositionTimeAl,
									'LatitudeAl'=>$LatitudeAl,
									'LongitudeAl'=>$LongitudeAl,
									'nomeAqAl'=>$nomeAqEp,
									'codGpPsAl'=>$codGpPsAl,
									'totalGpPsAl'=>$totalGpPsAl,
									'loopGpPsAl'=>$loopGpPsAl
								)
							);


						}

					}

					$l++;

				}

			}

		}

	}

	$i++;

}

usort($loopAl, "cmpMessageTimeAlStrtotime");

if(isset($_GET['sts'])){
	echo '<pre>';
	print_r($loopAl);
	#print_r($loopAlPs);
	print_r($loopAlPsGp2);
}
#print_r($loopAlPsGp);
#exit();


$tableAl = '<table cellpadding="0" cellspacing="0" border="1" width="100%">';
$tableAl .= '<tr>';
$tableAl .= '<td>ordemAl</td>';
$tableAl .= '<td>codAl</td>';
$tableAl .= '<td>AccountNumberAl</td>';
$tableAl .= '<td>codViAl</td>';
$tableAl .= '<td>VehicleCodeAl</td>';
$tableAl .= '<td>VehicleAddressAl</td>';
$tableAl .= '<td>LandmarkAl</td>';
$tableAl .= '<td>IgnitionAl</td>';
$tableAl .= '<td>SpeedAl</td>';
$tableAl .= '<td>RPMAl</td>';
$tableAl .= '<td>HodometerAl</td>';
$tableAl .= '<td>HourmeterAl</td>';
$tableAl .= '<td>MessageTimeAl</td>';
$tableAl .= '<td>LatitudeAl</td>';
$tableAl .= '<td>LongitudeAl</td>';
$tableAl .= '<td>Link Mapa</td>';
$tableAl .= '</tr>';

#LOOP ALERTAS ==
$ordemAl = 1;

foreach($loopAl as $rowAl){

	$codAl = $rowAl['codAl'];
	$AccountNumberAl = $rowAl['AccountNumberAl'];
	$codViAl = $rowAl['codViAl'];
	$VehicleCodeAl = $rowAl['VehicleCodeAl'];
	$VehicleAddressAl = $rowAl['VehicleAddressAl'];
	$LandmarkAl = utf8_decode($rowAl['LandmarkAl']);
	$IgnitionAl = $rowAl['IgnitionAl'];
	$SpeedAl = $rowAl['SpeedAl'];
	$RPMAl = $rowAl['RPMAl'];
	$HodometerAl = $rowAl['HodometerAl'];
	$HourmeterAl = $rowAl['HourmeterAl'];
	$MessageTimeAl = $rowAl['MessageTimeAl'];
	$MessageTimeAlLabel = date("d/m/Y", strtotime("$MessageTimeAl")).' '.date("H:i", strtotime("$MessageTimeAl"));
	$PositionTimeAl = $rowAl['PositionTimeAl'];
	$LatitudeAl = $rowAl['LatitudeAl'];
	$LongitudeAl = $rowAl['LongitudeAl'];

	$linkMapsAl = 'https://maps.google.com/?q='.$LatitudeAl.','.$LongitudeAl;

	#CONSULTAR REGISTRO ==
	$queryAl = mysqli_query($conectBdEp, "
		SELECT * FROM
			veiculosAlert
		WHERE
			codAl='$codAl'
	") or die(mysqli_error($conectBdEp));
	$totalAl = mysqli_num_rows($queryAl);

	if($totalAl == 0){

		#SALVAR DADOS ==
		/*
		mysqli_query($conectBdEp, "
			INSERT INTO
				veiculosAlert
				(
					codAl,
					AccountNumberAl,
					codViAl,
					VehicleCodeAl,
					VehicleAddressAl,
					LandmarkAl,
					IgnitionAl,
					SpeedAl,
					RPMAl,
					HodometerAl,
					HourmeterAl,
					MessageTimeAl,
					PositionTimeAl,
					LatitudeAl,
					LongitudeAl
				)
				VALUES
				(
					'$codAl',
					'$AccountNumberAl',
					'$codViAl',
					'$VehicleCodeAl',
					'$VehicleAddressAl',
					'$LandmarkAl',
					'$IgnitionAl',
					'$SpeedAl',
					'$RPMAl',
					'$HodometerAl',
					'$HourmeterAl',
					'$MessageTimeAl',
					'$PositionTimeAl',
					'$LatitudeAl',
					'$LongitudeAl'
				)
		") or die(mysqli_error($conectBdEp));
		*/

	} else {

		/*
		mysqli_query($conectBdEp, "
			UPDATE veiculosAlert SET
				LandmarkAl='$LandmarkAl',
				SpeedAl='$SpeedAl',
				codViAl='$codViAl',
				AccountNumberAl='$AccountNumberAl',
				VehicleCodeAl='$VehicleCodeAl',
				VehicleAddressAl='$VehicleAddressAl',
				LandmarkAl='$LandmarkAl',
				IgnitionAl='$IgnitionAl',
				SpeedAl='$SpeedAl',
				RPMAl='$RPMAl',
				HodometerAl='$HodometerAl',
				HourmeterAl='$HourmeterAl',
				MessageTimeAl='$MessageTimeAl',
				PositionTimeAl='$PositionTimeAl',
				LatitudeAl='$LatitudeAl',
				LongitudeAl='$LongitudeAl'
			WHERE
				codAl='$codAl'
		") or die(mysqli_error($conectBdEp));
		*/

	}

	#LINHAS ==
	$tableAl .= '<tr>';
	$tableAl .= '<td>'.$ordemAl.'</td>';
	$tableAl .= '<td>'.$codAl.'</td>';
	$tableAl .= '<td>'.$AccountNumberAl.'</td>';
	$tableAl .= '<td>'.$codViAl.'</td>';
	$tableAl .= '<td>'.$VehicleCodeAl.'</td>';
	$tableAl .= '<td>'.$VehicleAddressAl.'</td>';
	$tableAl .= '<td>'.$LandmarkAl.'</td>';
	$tableAl .= '<td>'.$IgnitionAl.'</td>';
	$tableAl .= '<td SpeedAl="'.$SpeedAl.'">'.$SpeedAl.'</td>';
	$tableAl .= '<td RPMAl="'.$RPMAl.'">'.$RPMAl.'</td>';
	$tableAl .= '<td>'.$HodometerAl.'</td>';
	$tableAl .= '<td>'.$HourmeterAl.'</td>';
	$tableAl .= '<td>'.$MessageTimeAlLabel.'</td>';
	$tableAl .= '<td>'.$LatitudeAl.'</td>';
	$tableAl .= '<td>'.$LongitudeAl.'</td>';
	$tableAl .= '<td><a href="'.$linkMapsAl.'" target="_blank">Mapa</a></td>';
	$tableAl .= '</tr>';

	$ordemAl++;

}

$tableAl .= '</table>';

$htmlAl = $tableAl;

?>


<?php
echo $htmlAl;
?>