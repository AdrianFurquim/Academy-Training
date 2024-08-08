<?php
    // Conexão com o banco de dados.
    include("conexao.php");

    // Variáveis vindas do criarTreino.php.
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verificação se $email e $senha foram escolhidos.
    if (empty($email) || empty($senha)) {
        header("location: ../login.php?situacao=faltando");
        exit();
    } else {
        // Preparar a declaração SQL para evitar SQL Injection
        $stmt = $conexao->prepare("SELECT * FROM usuario WHERE usu_email = ? AND usu_senha = ?");
        $stmt->bind_param("ss", $email, $senha);
        $stmt->execute();
        $result_usuario_existente = $stmt->get_result();

        // Verificar se o usuário existe
        if ($result_usuario_existente->num_rows > 0) {
            // Buscar o usuário encontrado
            $usuario = $result_usuario_existente->fetch_assoc();
            header("location: ../login.php?id=" . $usuario['usu_id']);
        } else {
            // Se o usuário não for encontrado, redireciona para a página de login com erro
            header("location: ../login.php?situacao=invalido");
        }

        // Fechar a declaração
        $stmt->close();
    }

    // Fechar a conexão com o banco de dados
    $conexao->close();
?>