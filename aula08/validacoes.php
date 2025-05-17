<?php 

function form_nao_enviado() {
    return $_SERVER['REQUEST_METHOD'] != 'POST';
}

function ha_campos_em_branco($dados) {
    return  empty($dados['nome']) || 
            empty($dados['fone']) || 
            empty($dados['email']);
}

function id_nao_recebido() {
    return !isset($_GET['id']);
}

?>