<?php

#CLASS ==
class classEp{

	#VARIÁVEIS ==
	public $urlApp = 'https://app2.nortetrac.com.br/';
	
	#VARIÁVEIS PARA COOKIES ==
	public $dominioCk = '.nortetrac.com.br';
	public $dominioPainelClienteCk = '.provisorio.ws';

	#CONEXÃO COM O BANCO DE DADOS ==
	function conectBdEp()
	{

		$hostBd = "127.0.0.1";
		$databaseBd = "norteTracApp";
		$usuarioBd = "norteTracApp";
		$senhaBd = "2012@norte";

		if ($this->conectBdEpSelecionado instanceof mysqli) {
			return $this->conectBdEpSelecionado;
		}

		$conectBd = mysqli_connect($hostBd, $usuarioBd, $senhaBd)
			or trigger_error(mysqli_error(), E_USER_ERROR);

		mysqli_select_db($conectBd, $databaseBd);

		$this->conectBdEpSelecionado = $conectBd;

		return $conectBd;
	}


	#FECHAR CONEXÃO ==
	function closeConectBdEp()
	{
		if ($this->conectBdEpSelecionado instanceof mysqli) {
			mysqli_close($this->conectBdEpSelecionado);
			$this->conectBdEpSelecionado = null;
		}
	}

	##########################################################################
	########################## Escapa Caracteres #############################
	##########################################################################
	function escapaCaracteresEp($texto, $tipo=''){
	
		if($tipo == ''){
		
			$texto = preg_replace('/\s/', ' ', $texto);
			
			#Validar CNPJ ==================================================
			$cnpj = preg_replace ("@[./-]@", "", $texto);
			$quatitidade = strlen($cnpj);
			
			if (($quatitidade == 14) && (is_numeric($cnpj))){
				$cnpj = preg_replace ("@[./-]@", " ", $texto);
				return $cnpj;
				return false;
			}
			
			#Validar Telefone ==============================================
			$telefone = preg_replace("@[-() ]@", '' , $texto);
			$telefone = str_ireplace('  ' , '', $telefone);
			$quatitidade = strlen($telefone);
			
			if(($quatitidade == 10) && is_numeric($telefone)){
				$telefone = preg_replace("@[-() ]@", ' ', $texto);
				return $telefone;
				return false;
			}
			
		}
		
		$texto = addslashes($texto);
		return $texto;
		
	}

	#GERAR METATAGS ==
	public function gerarMetatagsEp($array){
		
		if(!function_exists('pegar_tipo_img')){

			#PEGAR EXTENSAO DO ARQUIVO ==
			function pegar_tipo_img($src_img){
			
				if(preg_match('(.jpg|.jpeg)', $src_img)){
					$tipo_img = 'image/jpeg';
				} elseif(preg_match('(.png)', $src_img)){
					$tipo_img = 'image/png';
				} elseif(preg_match('(.gif)', $src_img)){
					$tipo_img = 'image/gif';
				} else {
					$tipo_img = '';	
				}
			
				return $tipo_img;
				
			}

		}
		
		#COLETAR DADOS ==
		$titulo_st = strip_tags($array['tituloSt']);
		$descricao_st = strip_tags($array['descricaoSt']);
		$autor_st = $array['autorSt'];
		
		$palavra_chave_st = '';
		if(isset($array['palavraChaveSt'])){
			$palavra_chave_st = strip_tags($array['palavraChaveSt']);
		}
		
		$og_site_name_st = strip_tags($array['ogSiteNameSt']);
		
		$og_titulo_name_st = '';
		if(isset($array['ogTituloNameSt'])){
			$og_titulo_name_st = strip_tags($array['ogTituloNameSt']);
		}
		
		$og_url_st = '';
		if(isset($_SERVER['SCRIPT_URI'])){
			$og_url_st = $_SERVER['SCRIPT_URI'];	
		}
		
		$og_titulo_st = strip_tags($array['ogTituloSt']);
		$og_descricao_st = strip_tags($array['ogDescricaoSt']);
		$og_nocache_st = $array['ogNocacheSt'];
		$og_url_image_st = $array['ogUrlImageSt'];
		$og_tipo_image_st = pegar_tipo_img($og_url_image_st);
		
		$metatags_st = '
		
			<title>'.$titulo_st.'</title>
			<meta name="description" content="'.$descricao_st.'">
			<meta name="author" content="'.$autor_st.'">
			
			<meta property="og:type" content="website"/>
			<meta name="language" content="pt-br" />
			
			<meta name="keywords" content="'.$palavra_chave_st.'">
			
			<meta property="og:site_name" content="'.$og_site_name_st.'"/>
			<meta property="og:title" content="'.$og_titulo_st.'" />
			<meta property="og:url" content="'.$og_url_st.'"/>
			<meta property="og:description" content="'.$og_descricao_st.'"/>
			<meta property="dol:nocache" content="786"/>
			<meta property="og:image" content="'.$og_url_image_st.'"/>
			<meta property="og:image:secure_url" content="'.$og_url_image_st.'" /> 
			<meta property="og:image:type" content="'.$og_tipo_image_st.'">
			
		';
		
		return $metatags_st;
		
	}

	#CONVERTER DATA ==
	function converterDataEp($data, $tipo='pt-br'){

		$dataRetorno = '';

		if(strlen($data) == 10){

			$data = preg_replace('/[^0-9]/', '', $data);

			#COLETANDO DADOS ==
			if($tipo == 'pt-br'){

				$dia = substr($data, 0, 2);
				$mes = substr($data, 2, 2);
				$ano = "20".substr($data, 4, 2);

				$dataRetorno = $dia.'/'.$mes.'/'.$ano;

			} elseif($tipo == 'en'){

				$dia = substr($data, 0, 2);
				$mes = substr($data, 2, 2);
				$ano = substr($data, 4, 4);

				$dataRetorno = $ano.'-'.$mes.'-'.$dia;

			}

		}

		return $dataRetorno;

	}

	#API SMTP ==
	function apiSMTP($arrayPostEp){
		
		#COLETANDO DADOS ==
		$arrayPostEp = http_build_query($arrayPostEp);

		#VARIÁVEIS ==
		$urlApi = 'https://api.nortetrac.com.br/apiSMTP/index.php';

		#CONEXÃO CURL ==
		$curlEp = curl_init();
		curl_setopt($curlEp, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curlEp, CURLOPT_POST, 1);
		curl_setopt($curlEp, CURLOPT_URL, $urlApi);
		curl_setopt($curlEp, CURLOPT_POSTFIELDS, $arrayPostEp);
		$resultadoEp = curl_exec($curlEp);
		$info = curl_getinfo($curlEp);
		$errorCurl = curl_error($curlEp);
		curl_close($curlEp);

		return $resultadoEp;

	}

}

?>