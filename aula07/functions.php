<?php

function verificar_envio_form() {
    
    return $_SERVER['REQUEST_METHOD'] == 'POST';    
    
}

function dados_em_branco($dados) {

    // Percorremos o array $dados e, a cada iteração do laço,
    // armazenamos o valor da posição atual do array na
    // variável $valor. Em seguida, testamos se $valor está
    // vazia E se é diferente de '0' (este teste adicional 
    // é importante, pois, para a função 'empty', 0 é 
    // considerdo valor vazio)
    foreach ($dados as $valor) {
        if (empty($valor ) && $valor !== "0") {
            return true; // há ao menos um campo vazio no form
        }
    }

    return false; // não há campos vazios no form

}

function nota_nao_numerica($dados) {

    // Percorrer array $dados
    foreach ($dados as $indice => $valor) {

        // Se o índice não for 'nome', faremos a próxima verificação
        if($indice !== 'nome') {
            
            // se o valor do índice atual NÃO FOR numérico
            if (!is_numeric($valor)) {
                return true; // retorna 'true'
            }
        }

    }

    return false; // se saiu do laço, significa que os valores das notas são numéricos

}

function nota_fora_intervalo($dados) {

    // Percorremos o array $dados copiando a cada iteração
    // o índice atual do array para a variável $indice, 
    // e o valor associado ao índice, para a variável $valor
    foreach ($dados as $indice => $valor) {

        // se o valor FOR um número
        if (is_numeric($valor)) {

            // Verificamos então se o valor é MENOR que zero
            // OU se o valor é MAIOR que 10
            if ($valor < 0 || $valor > 10) {
                return true; // nesse caso, retornamos 'true'
            }     
        }
    }

    return false; // saindo do laço, retornamos 'false', pois
    // significa que todos os valores numéricos estão dentro
    // do intervalo especificado

}

function calcular_media($dados) {
    
    $media = 0;

    foreach ($dados  as $valor) {

        if (is_numeric($valor)) {
            $media += $valor;
        }
    }

    return $media / 4;
    
}

function maior_nota($dados) {

   // Vamos percorrer o array $dados. a cada iteração,
   // copiamos o valor atual para a variável $valor.
   // Se o vlaor for numérico, criamos uma nova posição
   // par ao array '$notas', armazenando nesta posição
   // criada, o valor da posição atual do array.
    foreach ($dados as $valor) {

        if (is_numeric($valor)) {
            $notas[] = $valor;
        }
    }

    return max($notas);

}

function menor_nota($dados) {

    foreach ($dados as $valor) {

        if (is_numeric($valor)) {
            $notas[] = $valor;
        }
    }

    return min($notas);

}

function verificar_conceito($media) {

    if ($media <= 4) {
        $conceito = "Conceito E";
    
    } else if ($media < 6) {
        $conceito = "Conceito D";
    
    } else if ($media < 8) {
        $conceito = "Conceito C";
    
    } else if ($media < 9) {
        $conceito = "Conceito B";

    } else {
        $conceito = "Conceito A";
    }

    return $conceito;

}

?>