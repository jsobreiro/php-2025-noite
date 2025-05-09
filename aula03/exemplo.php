<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 03 - Exemplo</title>
</head>
<body>

    <p><a href="index.php">Voltar para Home</a></p>

    <h1>Exemplo</h1>

    <p>
        Informe um valor entre 1 e 100 para que o 
        sistema verifique se é par ou ímpar:
    </p>

    <form action="exemplo.php" method="post">

        <label for="valor">Valor</label> 
        <input type="number" name="valor" id="valor"
        min="0" max="100">

        <button type="submit">Verificar</button>
        
    </form>

    <?php 
    

        if (!empty($_POST['valor'])) {
    
            // receber o dado do campo "valor" enviado via 
            // "post" pelo form acima

            $valor  = $_POST['valor'];

            // verificar se 'valor' é par ou impar
            if ($valor % 2 == 0) {

                echo "<h3>" . $valor . " é par!<h3>";
            
            } else {

                echo "<h3>" . $valor . " é ímpar!<h3>";
            }

        }
    
    ?>
    
</body>
</html>