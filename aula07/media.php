<?php require_once 'functions.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 07 - Média Anual</title>
</head>
<body>
    
    <h1>Aula 07 - Média Anual de Matemática</h1>
    <p>
        <a href="index.php">Voltar à Home</a>
    </p>

    <?php

        // verificar se o form foi enviado
        if (!verificar_envio_form()) {
            // o form não foi enviado via post
            echo "<h3>Por favor, preencha o form na Home</h3>";
            exit(); // para a execução do script
        }

        // armazenar dados enviados via POST num array associ.
        $dados = $_POST; 
        // copia todos os dados de $_POST para '$dados'
        
        // Verificar se há campos em branco
        if (dados_em_branco($dados)) {
            echo "<h3>Todos os campos do form devem ser 
                preenchidos</h3>";
            exit();
        }

        // verificar se as notas SÃO VALORES NUMÉRICOS
        if (nota_nao_numerica($dados)) {
            echo "<h3>As notas devem ser valores numéricos</h3>";
            exit();
        }

        // verificar se os valores numéricos NÃO estão dentro
        // do intervalo especificado (entre 0 e 10)
        if (nota_fora_intervalo($dados)) {
            echo "<h3>As notas precisam estar entre 0 e 10</h3>";
            exit();
        }

        // Se passarmos por todas as verificações de erro acima,
        // podemos, enfim, realizar as ações necessárias desta página

        $media = calcular_media($dados);
        $maior = maior_nota($dados);
        $menor = menor_nota($dados);
        $conceito = verificar_conceito($media);

        echo "<h3>Boletim de Matemática do aluno " . $dados['nome'] . "</h3>";
        echo "1º Bimestre: " . $dados['bim1'] . "<br>";
        echo "2º Bimestre: " . $dados['bim2'] . "<br>";
        echo "3º Bimestre: " . $dados['bim3'] . "<br>";
        echo "4º Bimestre: " . $dados['bim4'] . "<br>";
        echo "Média anual: " . $media . " (" . $conceito . ")<br>";
        echo "Menor nota: " . $menor . "<br>";
        echo "Maior nota: " . $maior . "<br>";
        
    ?>

</body>
</html>