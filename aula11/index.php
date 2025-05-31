<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 11 - Sistema de Login</title>
</head>
<body>

    <h1>Aula 11 - Sistema de Login</h1>

    <nav>
        <a href="index.php">Home</a> |
        <a href="restrita.php">Página Restrita</a>
    </nav>

    <?php 
        require_once 'functions.php';

        validar_codigo();
    ?>

    <h2>Para acessar a página restrita, informe seus dados abaixo:</h2>

    <form action="validar.php" method="post">

        <p>
            <label for="usuario">Usuário:</label><br>
            <input type="text" name="usuario" id="usuario">
        </p>

        <p>
            <label for="senha">Senha:</label><br>
            <input type="password" name="senha" id="senha">
        </p>

        <button type="submit">Logar</button>

    </form>
    
</body>
</html>