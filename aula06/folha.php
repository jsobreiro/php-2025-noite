<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 06 - Folha de Pagamento</title>
</head>
<body>
    
    <h1>Aula 06 - Folha de Pagamento</h1>

    <?php

    // se esta página recebeu uma requisição post
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $funcionario = $_POST['funcionario'];
        $horas_trab  = $_POST['horas_trab'];
        $valor_hora  = $_POST['valor_hora'];

        // CALCULOS

        // salário bruto
        $sal_bruto = $horas_trab * $valor_hora;

        // IR
        if ($sal_bruto <= 1372.81) {
            $ir = 0;
        
        } else if ($sal_bruto <= 2745.25) {
            $ir = $sal_bruto * 0.15;

        } else {
            $ir = $sal_bruto * 0.275;
        }

        // INSS
        if ($sal_bruto <= 868.29) {
            $inss = $sal_bruto * 0.08; // 8%
        
        } else if ($sal_bruto <= 1447.14) {
            $inss = $sal_bruto * 0.09; // 9%

        } else if ($sal_bruto <= 2894.27) {
            $inss = $sal_bruto * 0.11; // 11%
        
        } else {
            $inss = 318.37; // valor fixo
        }

        // FGTS
        $fgts = $sal_bruto * 0.08;

        // Salário líquido
        $sal_liquido = $sal_bruto - $ir - $inss;


        // exibir dados na tela
        echo "<h3>Cálculos da Folha</h3>";

        
        /* função number_format:
            primeiro argumento: valor a ser formatado
            segundo argumento: quantidade de casas decimais
            terceiro argumento: separador decimal
            quarto argumento: separador de milhar
            exemplo: variável $valor tem o numero 1234.5 armazenado
            dentro dela. Ao formatá-la com number format:
                $valor = number_format($valor, 2, ',', '.')
            a variável $valor passará a conter o número 1.234,50
        */
        

       
        echo "Funcionário: " . $funcionario . "<br>";
        echo "Horas trabalhadas: " . formatar($horas_trab) . "h <br>";
        echo "Valor da hora: R$ " . formatar($valor_hora) . "<br>";
        echo "Salário bruto: R$ " . formatar($sal_bruto) . "<br>";
        echo "IR: R$ " . formatar($ir) . "<br>";
        echo "INSS: R$ " . formatar($inss) . "<br>";
        echo "FGTS: R$ " . formatar($fgts) . "<br>";
        echo "<strong>Salário Líquido: R$ " . formatar($sal_liquido) . "</strong>";

    } else {

        echo "<h3>Por favor, preencha todos os campos para 
        efetuar o cálculo<h3>";
    }


    function formatar($valor) {
        return number_format($valor, 2, ',', '.');
    }

    ?>

</body>
</html>