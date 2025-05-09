<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 05 - Arrays</title>
</head>
<body>

    <h1>Aula 05 - Exemplo Arrays</h1>

    <p>
        <a href="index.php">Voltar à Home</a>
    </p>

    <?php

        // DECLARAÇÃO DOS ARRAYS:

        // Utilizando a função 'array'
        $frutas = array("Laranja", "Maçã", "Pera");
        //      índices:    0         1       2

        // Utilizando colchetes
        $cidades =  [
                        "Curitiba",         // 0
                        "São Paulo",        // 1
                        "Rio de Janeiro",   // 2 
                        "Porto Alegre"      // 3
                    ];


        // Utilizando laço de repetição para
        // criar um array dinamicamente
        for ($i = 18; $i <= 30; $i++) {

            $idades[] = $i;

        }

        // Array Associativo
        $cliente =  [
                        'nome'  => "Jason Sobreiro",
                        'email' => "jasobreiro@up.edu.br",
                        'fone'  => "(41) 99999-8888"
                    ];

        // copiando o valor da posição 'nome'
        // para a variável 'nome':
        // $nome = $cliente['nome'];

        // MOSTRANDO DADOS DOS ARRAYS

        echo "<h2>Mostrando dados do array 'frutas'</h2>";
        echo $frutas[0] . ", " . $frutas[1] . ", " . $frutas[2];

        echo "<h2>Mostrando array 'cidades' com o laço 'for'</h2>";
        
        for ($i = 0; $i < count($cidades); $i++) {
            // count retorna o tamanho do array
            echo $cidades[$i] . "<br>";
        }

        echo "<h2>Mostrando array 'idades' com o laço 
        'foreach' simples</h2>";

        foreach ($idades as $idade_atual) {
            echo $idade_atual . "<br>";
        }

        echo "<h2>Mostrando array associativo 'cliente' 
        com o laço 'foreach' completo</h2>";

        foreach ($cliente as $chave => $valor) {
            
            echo ucfirst($chave) . ": " . $valor . "<br>";
            // ucfirst = torna a inicial da string maiuscula
        }

    ?>
    
</body>
</html>