<?php

#CADASTRAR VEÍCULOS ==
function insertVeiculoVi($loopVi, $conectBdEp){

	#LOOP DE VEÍCULOS ==
	foreach($loopVi as $rowVi){
		
		$codVi = $rowVi['codVi'];
		$tpVeiculoRegVi = $rowVi['tpVeiculoRegVi'];
		$placaVi = $rowVi['placaVi'];
		
		$codMarcaVi = '';
		if(isset($rowVi['codMarcaVi'])){
			$codMarcaVi = $rowVi['codMarcaVi'];	
		}
		
		$tituloMarcaVi = '';
		if(isset($rowVi['tituloMarcaVi'])){
			$tituloMarcaVi = $rowVi['tituloMarcaVi'];
		}

		$codTipoVi = '';
		if(isset($rowVi['codTipoVi'])){
			$codTipoVi = $rowVi['codTipoVi'];	
		}
		
		$tituloTipoVi = '';
		if(isset($rowVi['tituloTipoVi'])){
			$tituloTipoVi = $rowVi['tituloTipoVi'];
		}

		$codTpCarroceriaVi = '';
		if(isset($rowVi['codTpCarroceriaVi'])){
			$codTpCarroceriaVi = $rowVi['codTpCarroceriaVi'];	
		}
		
		$tituloTpCarroceriaVi = '';
		if(isset($rowVi['tituloTpCarroceriaVi'])){
			$tituloTpCarroceriaVi = $rowVi['tituloTpCarroceriaVi'];
		}

		$codCorVi = '';
		if(isset($rowVi['codCorVi'])){
			$codCorVi = $rowVi['codCorVi'];	
		}

		$tituloCorVi = '';
		if(isset($rowVi['tituloCorVi'])){
			$tituloCorVi = $rowVi['tituloCorVi'];	
		}
		
		$tituloTpCarroceriaVi = '';
		if(isset($rowVi['tituloTpCarroceriaVi'])){
			$tituloTpCarroceriaVi = $rowVi['tituloTpCarroceriaVi'];
		}

		$frotaVi = $rowVi['frotaVi'];
		$anoVi = $rowVi['anoVi'];
		$chassiVi = $rowVi['chassiVi'];
		$codClienteVi = $rowVi['codClienteVi'];

		$cidadePlacaVi = $rowVi['cidadePlacaVi'];
		$estadoPlacaVi = $rowVi['estadoPlacaVi'];

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
						placaVi,
						codTipoVi,
						codTpCarroceriaVi,
						cidadePlacaVi,
						estadoPlacaVi,
						codCorVi
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
						'$placaVi',
						'$codTipoVi',
						'$codTpCarroceriaVi',
						'$cidadePlacaVi',
						'$estadoPlacaVi',
						'$codCorVi'
					)
			") or die(mysqli_error($conectBdEp));

		} else {

			mysqli_query($conectBdEp, "
				UPDATE ATVClienteVi SET
					placaVi='$placaVi',
					codMarcaVi='$codMarcaVi',
					cidadePlacaVi='$cidadePlacaVi',
					estadoPlacaVi='$estadoPlacaVi',
					codCorVi='$codCorVi',
					codTipoVi='$codTipoVi',
					codTpCarroceriaVi='$codTpCarroceriaVi',
					frotaVi='$frotaVi',
					tpVeiculoRegVi='$tpVeiculoRegVi'
				WHERE
					codVi='$codVi' AND
					codClienteVi='$codClienteVi'
			") or die(mysqli_error($conectBdEp));

		}

	}

}

#CADASTRAR CONFIGURAÇÕES ==
function processarInsertCf($loopCf, $conectBdEp){

	#LOOP DE REGISTROS ==
	foreach($loopCf as $rowCf){

		#RETORNAR DADOS ==
		$tipoCf = $rowCf['tipoCf'];
		$codCf = $rowCf['codCf'];
		$tituloCf = $rowCf['tituloCf'];
		$codClienteCaCf = $rowCf['codClienteCaCf'];

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

			mysqli_query($conectBdEp, "
				UPDATE ATVClienteCf SET
					excluidoCf=0
				WHERE
					codCf='$codCf' AND
					codClienteCaCf='$codClienteCaCf'
			") or die(mysqli_error($conectBdEp));

		}

	}

}

?>