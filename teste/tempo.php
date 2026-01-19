<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

#FUNÇÃO DE TIMES ==
function getTotalTimeEp($arrayTimes){

	if(is_array($arrayTimes)){
		
		$totalSegundos = 0;

		foreach($arrayTimes as $time) {

			list($horas, $minutos, $segundos) = explode(':', $time);
			$totalSegundos += ($horas * 3600) + ($minutos * 60) + $segundos;

		}

		// Converter de volta para o formato de horas
		$totalHoras = floor($totalSegundos / 3600);
		if($totalHoras < 10){
			$totalHoras = "0$totalHoras";
		}
		
		$totalMinutos = floor(($totalSegundos % 3600) / 60);
		if($totalMinutos < 10){
			$totalMinutos = "0$totalMinutos";
		}

		$totalSegundosRestantes = floor($totalSegundos % 60);
		if($totalSegundosRestantes < 10){
			$totalSegundosRestantes = "0$totalSegundosRestantes";
		}

		$resultTotalTime =  "$totalHoras:$totalMinutos:$totalSegundosRestantes";

	} else {
		$resultTotalTime = "00:00:00";			
	}

	return $resultTotalTime;

}

$timesEp = getTotalTimeEp(
	array(
		'00:15:59',
		'00:15:01',
		'24:00:00',
	)
);

echo '<pre>';
print_r($timesEp);

?>