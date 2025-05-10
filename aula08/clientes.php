<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 08 - Clientes Cadastrados</title>
</head>
<body>
    
    <h1>Aula 08 - Clientes Cadastrados</h1>

    <p>
        <a href="index.php">Voltar à Home</a>
    </p>

    <?php

    // incluir arquivo de conexao
    require_once 'conexao.php';

    // estabelecer conexão com bd
    $conn = conectar_banco();

    // criar a nossa consulta (query) 
    $query = "SELECT * FROM tb_clientes";

    $resultado = mysqli_query($conn, $query);

    $linha_afetadas = mysqli_affected_rows($conn);

    // verificar se não há registros na tabela
    if ($linha_afetadas == 0) {
        exit("<h3>Não há clientes cadastrados!</h3>");
    }

    // verificar se há algum problema como a consulta (query)
    if ($linha_afetadas < 0) {
        exit("<h3>Erro ao exibir clientes cadastrados. 
        Verifique estrutura da consulta</h3>");
    }

    // Enquanto houver registros armazenados dentro de 'resultado'.
    // (registro = linha da tabela = cliente)
    // transforme o registro que está sendo acessado na iteração atual
    // do laço em um arrayu associativo chamado 'cliente'
    echo "<h2>Clientes Cadastrados</h2>";
    while ($cliente = mysqli_fetch_assoc($resultado)) {

        // mostrar os dados do array associativo na iteração atual:
        echo "ID #: "       .   $cliente['id']      . "<br>";
        echo "Nome: "       .   $cliente['nome']    . "<br>";
        echo "Fone: "       .   $cliente['fone']    . "<br>";
        echo "E-mail: "     .   $cliente['email']   . "<br><br>";

    }

    mysqli_close($conn);

    ?>

</body>
</html>