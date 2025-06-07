<?php require_once 'lock.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 12 - Lista de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body class="container">
    
    <h1>Aula 12 - Lista de Tarefas</h1>

    <nav>
        <a href="index.php">Home</a> | 
        <a href="restrita.php">Página Restrita</a> | 
        <a href="logout.php">Logout</a>
    </nav>

    <h2>Bem-vindo, <?= $_SESSION['usuario']; ?>!</h2>

    <?php
        require_once 'functions.php';

        validar_codigo();
    ?>


    <form action="cadastrar_tarefa.php" method="post">
        <p>
            <label for="tarefa">Nome da tarefa:</label> 
            <input type="text" name="tarefa" id="tarefa"> 
            <button type="submit" class="btn btn-outline-success btn-sm">Cadastrar</button>
        </p>
    </form>

    <?php
        require_once 'conexao.php';

        $conn = conectar_banco();

        $id = $_SESSION['id']; // armazena id do usuário logado

        // cria select para buscar tarefas do usuário logado
        $sql = "SELECT id_tarefa, tarefa FROM tb_tarefas 
                WHERE usuario_id = $id";
        
        $resultado = mysqli_query($conn, $sql);

        $linhas = mysqli_affected_rows($conn);

        if ($linhas < 0) { // verifica se há erro na consulta sql
            exit ("<h3>Erro ao buscar suas tarefas. 
            Acione o suporte ou tente novamente mais tarde</h3>");
        }

        if ($linhas == 0) { // verifica se não há tarefas cadastradas
            exit("<h3>Você não possui tarefas cadastradas</h3>");
        }

        echo '<div class="row">';
        echo '<div class="col-md-4">';
        echo '<table class="table table-striped">';
        while ($tarefa_atual = mysqli_fetch_assoc($resultado)) {
            $id_tarefa = $tarefa_atual['id_tarefa'];
            echo '<tr>';
            echo '<td>' . $tarefa_atual['tarefa'] . '</td>';
            echo '<td>';
            echo '<a class="btn btn-danger btn-sm" href="deletar_tarefa.php?id_tarefa='.$id_tarefa.'">x</a>';
            echo '</td>';
            echo '</tr>';

        }
        echo '</table>';
        echo '</div>';
        echo '</div>'

        
    ?>

</body>
</html> 