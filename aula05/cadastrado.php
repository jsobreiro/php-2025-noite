<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 05 - Produto Cadastrado</title>
</head>
<body>

    <h1>Aula 05 - Produto Cadastrado</h1>
    
    <p>
        <a href="index.php">Voltar à Home</a>
    </p>
    
    <?php

    // verificar se o form foi enviado via post

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // armazenar em variaveis locais os valores
        // enviados no formulario

        if ( empty($_POST['produto']) ||
             empty($_POST['valor'])   ||
             empty($_POST['quantidade']) ) {

            // mensagem de erro
            echo "<h3>Preencha todos os campos</h3>";
            // incluir novamente o form de cadastro
            require_once ('form_cadastro.php');

        } else {

            $produto = $_POST['produto'];
            $valor = $_POST['valor'];
            $quantidade = $_POST['quantidade'];

            // mostrando os dados na tela
            echo "<h2>Dados do Produto:</h2>";
            echo "Produto: " . $produto . "<br>";
            echo "Valor R$: " . $valor . "<br>";
            echo "Quantidade em estoque: " . $quantidade;
        }
    
    }


    ?>

</body>
</html>