<?php require_once 'lock.php'; // grante que somente usuário logado acesse a pagina

    if (!isset($_GET['id_tarefa'])) {
        header('location:restrita.php?codigo=1');
        exit;
    }

    // recebe parâmetro via GET convertendo-o para int
    $id_tarefa = (int)$_GET['id_tarefa'];

    require_once 'conexao.php';

    $conn = conectar_banco();

    $id_usuario = $_SESSION['id'];

    $sql = "DELETE FROM tb_tarefas WHERE id_tarefa = $id_tarefa 
            AND usuario_id = $id_usuario";

    mysqli_query($conn, $sql);

    $linhas = mysqli_affected_rows($conn);

    if ($linhas <= 0) { // verifica se há erro na consulta sql
        header('location:restrita.php?codigo=5');
        exit;
    }
    
    header('location:restrita.php');

?>