<?php
$image = file_get_contents($_POST['image_base64']);

//salva a imagem com o nome sendo a data
//file_put_contents( 'images/'.date('YmdHis').'.jpg', $image);

//exibe a imagem
header('Content-type: image/jpeg');
echo $image;