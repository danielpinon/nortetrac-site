<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Biblioteca</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"], input[type="number"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gerenciamento de Biblioteca</h1>

        <?php
        // Array inicial de livros
        $biblioteca = array(
            array("titulo" => "1984", "autor" => "George Orwell", "preço" => 29.99),
            array("titulo" => "O Senhor dos Anéis", "autor" => "J.R.R. Tolkien", "preço" => 49.99),
            array("titulo" => "O Alquimista", "autor" => "Paulo Coelho", "preço" => 19.99)
        );

        // Função para adicionar livro
        function adicionarLivro(&$biblioteca, $titulo, $autor, $preco) {
            array_push($biblioteca, array("titulo" => $titulo, "autor" => $autor, "preço" => $preco));
        }

        // Verificando se o formulário foi enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $titulo = $_POST["titulo"];
            $autor = $_POST["autor"];
            $preco = $_POST["preço"];
            adicionarLivro($biblioteca, $titulo, $autor, $preco);
        }

        // Função para exibir a tabela de livros
        function exibirBiblioteca($biblioteca) {
            echo '<table>';
            echo '<tr><th>Título</th><th>Autor</th><th>Preço</th></tr>';
            foreach ($biblioteca as $livro) {
                echo '<tr>';
                echo '<td>' . $livro["titulo"] . '</td>';
                echo '<td>' . $livro["autor"] . '</td>';
                echo '<td>R$ ' . number_format($livro["preço"], 2, ',', '.') . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        }

        // Função para calcular o valor total dos livros
        function calcularValorTotal($biblioteca) {
            $valorTotal = 0;
            foreach ($biblioteca as $livro) {
                $valorTotal += $livro["preço"];
            }
            return $valorTotal;
        }

        // Exibindo o formulário
        echo '<form method="post" action="">';
        echo 'Título: <input type="text" name="titulo" required><br>';
        echo 'Autor: <input type="text" name="autor" required><br>';
        echo 'Preço: <input type="number" name="preço" step="0.01" required><br>';
        echo '<input type="submit" value="Adicionar Livro">';
        echo '</form>';

        // Exibindo a biblioteca
        exibirBiblioteca($biblioteca);

        // Calculando o valor total dos livros
        $valorTotal = calcularValorTotal($biblioteca);
        echo '<h2>Valor Total dos Livros: R$ ' . number_format($valorTotal, 2, ',', '.') . '</h2>';
        ?>

    </div>
</body>
</html>
