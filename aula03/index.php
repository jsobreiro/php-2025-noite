<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 03 - Home</title>
</head>
<body>
    
    <h1>Aula 03 - Home</h1>

    <?php  
    
        $aluno = "Jason Sobreiro";
        $curso = "ADS";
        $aula = 3;

        echo "Aluno: " . $aluno . "<br>";// concatenação
        echo "Curso: $curso<br>"; // interpolação
        echo "Aula de PHP: " . $aula . "<br>";

    ?>

    <h3>Lista de Exercícios</h3>

    <ul>
        <li><a href="exemplo.php">Exemplo</a></li>
        <li><a href="ex01.php">Exercício 01</a></li>
    </ul>

</body>
</html>