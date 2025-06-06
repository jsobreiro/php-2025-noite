<?php require_once 'lock.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 12 - Lista de Tarefas</title>
</head>
<body>
    
    <h1>Aula 12 - Lista de Tarefas</h1>

    <nav>
        <a href="index.php">Home</a> | 
        <a href="restrita.php">Página Restrita</a> | 
        <a href="logout.php">Logout</a>
    </nav>

    <h2>Bem-vindo, <?= $_SESSION['usuario']; ?>!</h2>

    <h3>Se você está nesta página, você logou com sucesso!</h3>

</body>
</html>