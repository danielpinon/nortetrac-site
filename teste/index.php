<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


#VARIÁVEIS ==
$hostBd = "54.94.126.61";
$databaseBd = "enviopro";
$usuarioBd = "envioprologin";
$senhaBd = "H1!flW-pl(fguqLZ";

$conectBd = mysqli_connect($hostBd, $usuarioBd, $senhaBd) or trigger_error(mysqli_error(), E_USER_ERROR);
mysqli_select_db($conectBd, $databaseBd);

$query = mysqli_query($conectBd, "SELECT * FROM favorites") or die(mysqli_error($conectBd));
$row = mysqli_fetch_assoc($query);
echo $total = mysqli_num_rows($query);

?>