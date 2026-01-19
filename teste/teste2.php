<?php

# Configurações do banco de dados ==
$hostBd = "54.207.221.143";
$usuarioBd = "nortetrac";
$senhaBd = "2012@norte";
$databaseBd = "NorteTracApp";

# Conexão com o banco de dados ==
$conectBd = mysqli_connect($hostBd, $usuarioBd, $senhaBd, $databaseBd);

# Verificar conexão ==
if (!$conectBd) {
    die("Erro na conexão: " . mysqli_connect_error());
}

mysqli_set_charset($conectBd, "utf8");

# Criar array para armazenar os clientes
$clientes = array();

# Listar dados do Cliente ==
$sql = "SELECT * FROM clientes";
$resultado = mysqli_query($conectBd, $sql);

if(mysqli_num_rows($resultado) > 0){
    while($row = mysqli_fetch_assoc($resultado)){
        // Criar array associativo para cada cliente
        $cliente = array(
            "id" => $row["codCa"],
            "nome" => $row["nomeCa"],
            "email" => $row["emailCa"],
            "telefone" => $row["telefoneCa"],
            "endereco" => $row["enderecoCa"],
            "cidade" => $row["cidadeCa"],
            "estado" => $row["estadoCa"]
        );
        
        // Adicionar o cliente ao array principal
        $clientes[] = $cliente;
    }
    
    // Exibir os dados do array
    echo "<h2>Dados dos Clientes</h2>";
    foreach($clientes as $cliente){
        echo "ID: " . $cliente["id"] . "<br>";
        echo "Nome: " . $cliente["nome"] . "<br>";
        echo "Email: " . $cliente["email"] . "<br>";
        echo "Telefone: " . $cliente["telefone"] . "<br>";
        echo "Endereço: " . $cliente["endereco"] . "<br>";
        echo "Cidade: " . $cliente["cidade"] . "<br>";
        echo "Estado: " . $cliente["estado"] . "<br>";
        echo "-------------------<br>";
    }
}

# Fechar a conexão ==
mysqli_close($conectBd);

?>