<?php
    // Conexão com o banco de dados.
    include("conexao.php");

    // Variáveis vindas do criarTreino.php.
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $confEmail = $_POST['confEmail'];
    $senha = $_POST['senha'];
    $confSenha = $_POST['confSenha'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $meta = $_POST['meta'];

    // Verificação se $email e $senha foram escolhidos.
    if (empty($nome) || empty($email) || empty($confEmail) || empty($senha) || empty($confSenha)) {
        header("location: ../criarCadastro.php?situacao=falha");
        exit();
    } else {
        if (empty($altura)) {
            $altura = "-";
        }

        if (empty($peso)) {
            $peso = "-";
        }

        if (empty($meta)) {
            $meta = "-";
        }

        // Preparar a declaração SQL para evitar SQL Injection
        $stmt = $conexao->prepare("INSERT INTO usuario (usu_nome, usu_email, usu_senha, usu_altura, usu_tempo_treinando, usu_peso, usu_meta) 
        VALUES (?, ?, ?, ?, 1, ?, ?)");
        $stmt->bind_param("ssssss", $nome, $email, $senha, $altura, $peso, $meta);

        // Executar a consulta
        if ($stmt->execute()) {
            header("location: ../login.php?situacao=sucesso");
        } else {
            header("location: ../login.php?situacao=falha");
        }

        // Fechar a declaração
        $stmt->close();
    }

    // Fechar a conexão com o banco de dados
    $conexao->close();
?>
