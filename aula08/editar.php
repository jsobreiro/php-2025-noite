<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 08 - Parte 2 - Editar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="container-fluid">
    <h1>Aula 08 - Parte 2 - Editar Cliente</h1>
    
    <?php

        require_once 'menu.php';

        require_once 'validacoes.php';

        // verificar se o id foi recebido
        if (id_nao_recebido()){
            exit("<h3>Erro ao editar cliente: ID não especificado</h3>");
        }

        // se foi recebido, armazenamos ele numa variável local
        $id = (int)$_GET['id'];

        require_once 'conexao.php';

        $conn = conectar_banco();

        $query = "SELECT * FROM tb_clientes WHERE id = $id";

        $resultado = mysqli_query($conn, $query);

        $linhas_afetadas = mysqli_affected_rows($conn);

        // verificar se não há registros na tabela
        if ($linhas_afetadas == 0) {
            exit("<h3>Não foi possível carregar dados do cliente especificado</h3>");
        }

        // verificar se há algum problema como a consulta (query)
        if ($linhas_afetadas < 0) {
            exit("<h3>Erro ao buscar dados do cliente. Verifique estrutura da consulta</h3>");
        }

        // transformar em array associativo o cliente armazenado em '$resultado'
        $cliente = mysqli_fetch_assoc($resultado);
    ?>

    <h2>Editar Cliente</h2>

    <form action="editado.php" method="post">

        <label for="nome">Nome: </label><br>
        <input type="text" name="nome" id="nome"
        value="<?= $cliente['nome']; ?>"><br><br>

        <label for="fone">Fone: </label><br>
        <input type="text" name="fone" id="fone"
        value="<?= $cliente['fone']; ?>"><br><br>

        <label for="email">E-mail: </label><br>
        <input type="email" name="email" id="email"
        value="<?= $cliente['email']; ?>"><br><br>

        <input type="hidden" name="id" value="<?= $id; ?>">

        <button type="submit" class="btn btn-warning">Editar</button>

    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>