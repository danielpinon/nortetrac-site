<!DOCTYPE html>
<html lang="pt-bt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foto Webcam</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <script src="script.js"></script>
</head>
<body>

    <div class="content">
        <video autoplay="true" id="webcam"></video>

        <button type="button" onclick="foto()" class="btn">Tirar foto e salvar</button>
        
        <div class="image">
            <img src="person.svg" id="foto">
        </div>
        <form method="POST" action="imagem.php">
            <textarea name="image_base64" id="base64"></textarea>
            
            <button type="submit" class="btn">Enviar Imagem</button>
        </form>
    </div>
    
</body>
</html>