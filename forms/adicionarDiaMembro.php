<?php
    // Conexão com o banco de dados.
    include("conexao.php");

    // Variáveis vindas do criarTreino.php.
    $dia = isset($_POST['dia']) ? $_POST['dia'] : null;
    $membro = isset($_POST['membro_treino']) ? $_POST['membro_treino'] : null;
    $usuario_id = isset($_GET['id']) ? $_GET['id'] : null;

    // Verificação se as váriaveis não estão vazias
    if ($dia == "" || $membro == "") {
        header("location: ../organizarDiasMembros.php?situacao=caiunoinicio");
    } else {
        // Inserindo os dados na tabela Treinos.
        $stmt = $conexao->prepare("INSERT INTO treinos(membro_nome, dia_nome) VALUES ( ?, ?)");
        $stmt->bind_param("ss", $membro, $dia);
        // Executando INSERT.
        if ($stmt->execute()) {
            $treinos_inserido_id = $stmt->insert_id;
            $stmt->close();

            // Inserindo os dados na tabela Treinos_exercicios.
            $stmt = $conexao->prepare("INSERT INTO treino_exercicios(usuario_id, treino_id) VALUES (?, ?)");
            $stmt->bind_param("ii", $usuario_id, $treinos_inserido_id);
            // Executando INSERT.
            
            if ($stmt->execute()) {
                // Sucesso na inserção.
                header("location: ../organizarDiasMembros.php?situacaoMen=sucesso&situacao=conectado&id=$usuario_id");
                exit();
            }
        }
        header("location: ../organizarDiasMembros.php?situacaoMen=errou&situacao=conectado&id=$usuario_id");
    }
    
?>
