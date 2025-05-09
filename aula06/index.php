<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 06 - Home</title>
</head>
<body>

    <h1>Aula 06 - Home</h1>

    <h2>Cadastro de Folha de Pagamento</h2>

    <form action="folha.php" method="post">

    <p>    
        <input type="text" name="funcionario" 
        placeholder="Nome do funcionário" required>
    </p>

    <p>
        <input type="number" name="horas_trab"
        placeholder="Horas trabalhadas" required
        min="1">
    </p>

    <p>
        <input type="number" name="valor_hora" 
        placeholder="Valor da hora R$" required
        min="10" step="0.01">
    </p>

    <p>
        <button type="submit">Calcular</button>
    </p>

    </form>
    
</body>
</html>