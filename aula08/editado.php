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

        // Verificar se o form não foi enviado.
        // Se verdadeiro, exibe msg de erro, e encerra execução do script
        if (form_nao_enviado()) {
            exit("<h3>Formulário de edição não enviado.</h3>");
        }

        // Verificar se há campos deixados em branco no form.
        // Se verdadeiro, exibe msg de erro, e encerra execução do script
        if (ha_campos_em_branco($_POST)) {
            exit("<h3>Por favor, preencha todos os campos do form de edição</h3>");
        }

        // Se passamos pelas duas validações acima, continuamos:

        // Armazenar em variáveis locais, os dados enviados via POST
        $nome   = $_POST['nome'];
        $fone   = $_POST['fone'];
        $email  = $_POST['email'];
        $id     = (int)$_POST['id'];

        require_once 'conexao.php';

        $conn = conectar_banco();

        $sql = "UPDATE tb_clientes SET nome = ?, fone = ?, email = ? 
                WHERE id = ?";

        $stmt = mysqli_prepare($conn, $sql);

        if(!$stmt){
            exit("<h3>Erro na preparação da consulta...</h3>");
        }

        mysqli_stmt_bind_param($stmt, 'sssi', $nome, $fone, $email, $id);

        if (!mysqli_execute($stmt)){
            exit('<h3>Erro ao executar comando: '. mysqli_stmt_error($stmt) . '</h3>');
        }

        $linhas_afetadas = mysqli_affected_rows($conn);

        if ($linhas_afetadas == 0) {
            exit ("<h3>Nenhum dado foi alterado do cliente informado</h3>");
        }

        if ($linhas_afetadas < 0) {
            exit ("<h3>Erro ao editar cliente especificado. Verifique ID do cliente</h3>");
        }

        echo "<h3>Cliente editado com sucesso!</h3>";    
    
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>