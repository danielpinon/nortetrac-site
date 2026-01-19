<?php

if(isset($_GET['senha_ep'])){

	$senha_ep = $_GET['senha_ep'];
	$senha_ep_criptografado = hash('whirlpool', md5($senha_ep));

	echo $senha_ep;
	echo '<br>';	
	echo $senha_ep_criptografado;

}

?>