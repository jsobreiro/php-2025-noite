<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 03 - Ex 01</title>
</head>
<body>
    
    <p><a href="index.php">Voltar para Home</a></p>

    <h1>Exercício 01</h1>

    <p>
        Digite um valor inteiro. Faça o sistema mostrar a 
        mensagem "O valor é maior que 10!", caso o valor 
        digitado seja maior que 10, ou, caso contrário, mostrar 
        a mensagem "O valor é menor ou igual a 10!".
    </p>

    <form action="ex01.php" method="post">

        <label for="numero">Número: </label>
        <input type="number" name="numero" id="numero">

        <button type="submit">Verificar</button>

    </form>

    <?php
    
    if (!empty($_POST['numero'])) {

        $numero = $_POST['numero'];

        if ($numero > 10) {

            echo "<h3>" . $numero . " é maior que 10!</h3>";
        
        } else if ($numero == 10) { // resposta ampliadas

            echo "<h3>" . $numero . " é igual a 10!</h3>";

        } else {

            echo "<h3>" . $numero . " é menor que 10!</h3>";
        }

    }
    
    ?>

</body>
</html>