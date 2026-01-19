<?php

#REQUIRES ==
require_once "./conect.php";

#DIAT ==
$queryDt = mysqli_query($conectBdEp, "
	SELECT * FROM
		diatDt
") or de(mysqli_error($conectBdEp));
$rowDt = mysqli_fetch_assoc($queryDt);
$totalDt = mysqli_num_rows($queryDt);

$arrayDt = array();
$arrayDt['totalDt'] = $totalDt;
$arrayDt['loopDt'] = array();

$codsDt = array();

if($totalDt > 0){

	do{

		$codDt = $rowDt['codDt'];
		$codClienteDt = $rowDt['codClienteDt'];
		$dadosVi = array();

		$arrayDt['loopDt']["$codDt"]['codDt'] = $codDt;
		$arrayDt['loopDt']["$codDt"]['codClienteDt'] = $codClienteDt;
		$arrayDt['loopDt']["$codDt"]['dadosVi'] = $dadosVi;

		if(strlen($codDt)){

			array_push(
				$codsDt,
				"'$codDt'"
			);

		}

	}while($rowDt = mysqli_fetch_assoc($queryDt));

	$codsDt = array_unique($codsDt);
	$codsDt = join(",", $codsDt);

	if(strlen($codsDt) > 0){

		$queryVi = mysqli_query($conectBdEp, "
			SELECT * FROM 
				diatDtVi
			WHERE 
				codDtVi IN($codsDt)
		") or die(mysqli_error($conectBdEp));
		$rowVi = mysqli_fetch_assoc($queryVi);
		$totalVi = mysqli_num_rows($queryVi);

		$arrayVi = array();
		$arrayVi['totalVi'] = 0;
		$arrayVi['loopVi'] = array();

		if($totalVi > 0){

			do{

				$codVi = $rowVi['codVi'];
				
				$codDtVi = $rowVi['codDtVi'];

				$arqDocVi = $rowVi['arqDocVi'];

				$codMarcaVi = $rowVi['codMarcaVi'];
				$marcaVi = '';
				if(isset($loopCf["$codMarcaVi"])){
					$marcaVi = $loopCf["$codMarcaVi"]['tituloCf'];
				}

				$codModeloVi = $rowVi['codModeloVi'];
				$modeloVi = '';
				if(isset($loopCf["$codModeloVi"])){
					$modeloVi = $loopCf["$codModeloVi"]['tituloCf'];
				}

				$codTipoVi = $rowVi['codTipoVi'];
				$tipoVi = '';
				if(isset($loopCf["$codTipoVi"])){
					$tipoVi = $loopCf["$codTipoVi"]['tituloCf'];
				}

				$codTpCarroceriaVi = $rowVi['codTpCarroceriaVi'];
				$tpCarroceriaVi = '';
				if(isset($loopCf["$codTpCarroceriaVi"])){
					$tpCarroceriaVi = $loopCf["$codTpCarroceriaVi"]['tituloCf'];
				}

				$codCorVi = $rowVi['codCorVi'];
				$corVi = '';
				if(isset($loopCf["$codCorVi"])){
					$corVi = $loopCf["$codCorVi"]['tituloCf'];
				}

				$anoVi = $rowVi['anoVi'];
				$placaVi = $rowVi['placaVi'];
				$chassiVi = $rowVi['chassiVi'];
				$cidadePlacaVi = utf8_encode($rowVi['cidadePlacaVi']);
				$estadoPlacaVi = $rowVi['estadoPlacaVi'];
				$codBateriaVi = $rowVi['codBateriaVi'];
				$bateriaVi = '';
				if(isset($loopCf["$codBateriaVi"])){
					$bateriaVi = $loopCf["$codBateriaVi"]['tituloCf'];
				}

				$arrayVi['loopVi']["$codDtVi"] = array(
					'codVi'=>$codVi,
					'codDtVi'=>$codDtVi,
					'arqDocVi'=>$arqDocVi,
					'codMarcaVi'=>$codMarcaVi,
					'marcaVi'=>$marcaVi,
					'codModeloVi'=>$codModeloVi,
					'modeloVi'=>$modeloVi,
					'codTipoVi'=>$codTipoVi,
					'tipoVi'=>$tipoVi,
					'codTpCarroceriaVi'=>$codTpCarroceriaVi,
					'tpCarroceriaVi'=>$tpCarroceriaVi,
					'codCorVi'=>$codCorVi,
					'corVi'=>$corVi,
					'anoVi'=>$anoVi,
					'placaVi'=>$placaVi,
					'chassiVi'=>$chassiVi,
					'cidadePlacaVi'=>$cidadePlacaVi,
					'estadoPlacaVi'=>$estadoPlacaVi,
					'codBateriaVi'=>$codBateriaVi,
					'bateriaVi'=>$bateriaVi,
					'tpVeiculoATVDtVi'=>'veiculo'
				);

			}while($rowVi = mysqli_fetch_assoc($queryVi));

		}

		#LOOP DE DADOS ==
		$i = 0;
		foreach($arrayDt['loopDt'] as $rowDt){

			$codDt = $rowDt['codDt'];

			#CLIENTE ==
			if(isset($arrayVi['loopVi']["$codDt"])){

				$arrayDt['loopDt']["$codDt"]['dadosVi'] = $arrayVi['loopVi']["$codDt"];

			}

			$i++;

		}

		foreach($arrayDt['loopDt'] as $rowDt){

			$codDt = $rowDt['codDt'];
			$codClienteDt = $rowDt['codClienteDt'];
			$dadosVi = $rowDt['dadosVi'];

			if(count($dadosVi) > 0){

				$codVi = $dadosVi['codVi'];
				$codDtVi = $dadosVi['codDtVi'];
				$codMarcaVi = $dadosVi['codMarcaVi'];
				$codModeloVi = $dadosVi['codModeloVi'];
				$codTipoVi = $dadosVi['codTipoVi'];
				$codTpCarroceriaVi = $dadosVi['codTpCarroceriaVi'];
				$anoVi = $dadosVi['anoVi'];
				$placaVi = $dadosVi['placaVi'];
				$chassiVi = $dadosVi['chassiVi'];
				$cidadePlacaVi = $dadosVi['cidadePlacaVi'];
				$estadoPlacaVi = $dadosVi['estadoPlacaVi'];
				$codBateriaVi = $dadosVi['codBateriaVi'];
				$tpVeiculoATVDtVi = $dadosVi['tpVeiculoATVDtVi'];

				$codClienteVi = $codClienteDt;
				$codClienteCaVi = '';

				if(strlen($placaVi) > 0){

					#CHECAR SE REGISTRO EXISTE NO CLIENTE ==
					$queryViCa = mysqli_query($conectBdEp, "
						SELECT * FROM 
							clientesVi 
						WHERE 
							placaVi LIKE('%$placaVi%')
					") or die(mysqli_error($conectBdEp));
					$rowViCa = mysqli_fetch_assoc($queryViCa);
					$totalViCa = mysqli_num_rows($queryViCa);

					if($totalViCa == 0){

						$codViIn = uniqid();
						
						#INSERIR DADOS ==
						mysqli_query($conectBdEp, "
							INSERT INTO
								clientesVi
									(
										codVi,
										arqDocVi,
										codMarcaVi,
										codModeloVi,
										codTipoVi,
										codTpCarroceriaVi,
										codCorVi,
										anoVi,
										placaVi,
										chassiVi,
										cidadePlacaVi,
										estadoPlacaVi,
										codBateriaVi,
										codClienteVi,
										codClienteCaVi,
										tpVeiculoATVDtVi
									)
								VALUES
									(
										'$codViIn',
										'$arqDocVi',
										'$codMarcaVi',
										'$codModeloVi',
										'$codTipoVi',
										'$codTpCarroceriaVi',
										'$codCorVi',
										'$anoVi',
										'$placaVi',
										'$chassiVi',
										'$cidadePlacaVi',
										'$estadoPlacaVi',
										'$codBateriaVi',
										'$codClienteVi',
										'$codClienteCaVi',
										'$tpVeiculoATVDtVi'
									)
						") or die(mysqli_error($conectBdEp));

					} else {

						#ATUALIZAR ==
						mysqli_query($conectBdEp, "
							UPDATE
								clientesVi
							SET
								tpVeiculoATVDtVi='$tpVeiculoATVDtVi',
								codClienteVi='$codClienteVi'
							WHERE
								placaVi LIKE('%$placaVi%')
						") or die(mysqli_error($conectBdEp));

					}

				}

			}

		}

	}

}

echo '<pre>';
print_r($arrayDt);

?>