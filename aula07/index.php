<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 07 - Home</title>
</head>
<body>

    <h1>Aula 07 - Home</h1>

    <h2>Boletim de Matemática</h2>

    <h3>
        Informe o nome do aluno e suas 
        4 notas bimestrais
    </h3>

    <form action="media.php" method="post">

        <label for="nome">Nome: </label><br>
        <input type="text" name="nome" id="nome"><br>

        <label for="bim1">1º Bimestre: </label><br>
        <input type="number" name="bim1" id="bim1" step="0.1"><br>

        <label for="bim2">2º Bimestre: </label><br>
        <input type="number" name="bim2" id="bim2" step="0.1"><br>

        <label for="bim3">3º Bimestre: </label><br>
        <input type="number" name="bim3" id="bim3" step="0.1"><br>

        <label for="bim4">4º Bimestre: </label><br>
        <input type="number" name="bim4" id="bim4" step="0.1"><br>

        <button type="submit">Calcular</button>

    </form>


</body>
</html>