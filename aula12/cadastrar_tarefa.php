<?php require_once 'lock.php'; // grante que somente usuário logado acesse a pagina

    require_once 'functions.php';

    if (form_nao_enviado()) { // acessamos a página via GET
        header('location:restrita.php?codigo=1');
        exit;
    }

    if (tarefa_em_branco()) { // submetemos o form vazio
        header('location:restrita.php?codigo=2');
        exit;
    }

    $tarefa = $_POST['tarefa']; // armazena tarefa enviada via post
    $id = $_SESSION['id']; // armazena id do usuário registrado na sessão

    require_once 'conexao.php';

    $conn = conectar_banco();
    
    $sql = "INSERT INTO tb_tarefas (tarefa, usuario_id) 
            VALUES (?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) { // se ocorreu um erro ao preparar o comando sql
        header('location:restrita.php?codigo=4');
        exit;
    }

    // se ocorreu um erro ao associar os parâmetros a declaração
    if (!mysqli_stmt_bind_param($stmt, "si", $tarefa, $id)) {
        header('location:restrita.php?codigo=4');
        exit;
    }

    // se ocorreu um erro ao executar o comando sql declarado
    if (!mysqli_stmt_execute($stmt)){
        header('location:restrita.php?codigo=4');
        exit;
    }

    // se passou por todas as validaçõs acima, conseguimos realizar
    // o INSERT com sucesso. Neste caso, apenas retornamos à página
    // restrita, mas sem a necessidade de devolver qualquer código de erro
    header('location:restrita.php');

?>