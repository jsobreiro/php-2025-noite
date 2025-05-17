<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 08 - Clientes Cadastrados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="container-fluid">
    
    <h1>Aula 08 - Clientes Cadastrados</h1>

    <?php

    require_once 'menu.php';

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

    echo '<table class="table table-hover">';
    echo    '<tr class="table-info">';
    echo        '<th>ID #</th>';
    echo        '<th>Nome</th>';
    echo        '<th>Fone</th>';
    echo        '<th>E-mail</th>';
    echo        '<th>Ações</th>';
    echo    '</tr>';

    while ($cliente = mysqli_fetch_assoc($resultado)) {

        // mostrar os dados do array associativo na iteração atual:
        echo '<tr>';
            echo '<td>' .  $cliente['id']    . '</td>';
            echo '<td>' .  $cliente['nome']  . '</td>';
            echo '<td>' .  $cliente['fone']  . '</td>';
            echo '<td>' .  $cliente['email'] . '</td>';
            echo '<td>';
            echo        '<a class="btn btn-sm btn-outline-danger"  href="excluir.php?id=' . $cliente['id'] .'">Excluir</a> | ';
            echo        '<a class="btn btn-sm btn-outline-warning" href="editar.php?id='  . $cliente['id'] .'">Editar</a>';
            echo '</td>';
        echo '</tr>';
    }

    echo '</table>';

    mysqli_close($conn);

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>