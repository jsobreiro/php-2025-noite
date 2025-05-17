<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 08 - Parte 2 - Excluir Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="container-fluid">
    <h1>Aula 08 - Parte 2 - Excluir Cliente</h1>

    <?php 
        require_once 'menu.php';

        require_once 'validacoes.php';

        // verificar se o id foi recebido
        if (id_nao_recebido()){
            exit("<h3>Erro ao excluir cliente: ID não especificado</h3>");
        }

        // se foi recebido, armazenamos ele numa variável local
        $id = (int)$_GET['id'];

        require_once 'conexao.php';

        $conn = conectar_banco();

        $sql = "DELETE FROM tb_clientes WHERE id = $id";

        $resultado = mysqli_query($conn, $sql);

        $linha_afetadas = mysqli_affected_rows($conn);

        // verificar se não há registros na tabela
        if ($linha_afetadas == 0) {
            exit("<h3>Não foi possível excluir o cliente especificado!</h3>");
        }

        // verificar se há algum problema como a consulta (query)
        if ($linha_afetadas < 0) {
            exit("<h3>Erro ao excluir cliente. Verifique estrutura da consulta</h3>");
        }

        echo "<h3>Cliente excluído com sucesso!</h3>";        

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>