<?php
    // Conexão com o banco de dados.
    include("conexao.php");

    // Variaveis vindas do criarTreino.php.
    $exe_nome=$_POST['ombro'];
    $ser_serie=$_POST['serieOmbro'];

    // Verificação se $exe_nome e $ser_serie foram escolhidos.
    if (empty($exe_nome) || empty($ser_serie)) {
        header("location: ../criarTreino.php?membro=Ombro&situacao=faltando");
        exit();
    } else {
        // Select específico para pegar o id do exercício existente.
        $stmt = $conexao->prepare("SELECT exe_id FROM exercicio WHERE exe_nome = ?");
        $stmt->bind_param("s", $exe_nome);
        $stmt->execute();
        $result_exercicios_banco_esp = $stmt->get_result();
        $stmt->close();

        if ($result_exercicios_banco_esp->num_rows > 0) {
            $exercicio = $result_exercicios_banco_esp->fetch_assoc();
            $exercicio_id = $exercicio['exe_id'];

            // Select específico para pegar o id da série existente.
            $stmt = $conexao->prepare("SELECT ser_id FROM serie_ordem WHERE ser_serie = ?");
            $stmt->bind_param("s", $ser_serie);
            $stmt->execute();
            $result_series_banco = $stmt->get_result();
            $stmt->close();

            if ($result_series_banco->num_rows > 0) {
                $serie = $result_series_banco->fetch_assoc();
                $serie_id = $serie['ser_id'];

                // Inserção na tabela exercicio_serieordem.
                $stmt = $conexao->prepare("INSERT INTO exercicio_serieordem (exercicio_id, serie_id) VALUES (?, ?)");
                $stmt->bind_param("ii", $exercicio_id, $serie_id);
                if ($stmt->execute()) {
                    $exercicio_serie_id = $stmt->insert_id;
                    $stmt->close();

                    // Pegar o treino correspondente ao usuário.
                    $stmt = $conexao->prepare("SELECT * FROM treinos WHERE membro_nome = 'Ombro';");
                    $stmt->execute();
                    $result_treino = $stmt->get_result();
                    $stmt->close();

                    if ($result_treino->num_rows > 0) {
                        $treino = $result_treino->fetch_assoc();
                        $treino_id = $treino['tre_id'];

                        // Inserção na tabela treino_exercicios.
                        $stmt = $conexao->prepare("INSERT INTO treino_exercicios (usuario_id, treino_id, exercicio_serie_id) VALUES (1, ?, ?)");
                        $stmt->bind_param("ii", $treino_id, $exercicio_serie_id);
                        if ($stmt->execute()) {
                            // Sucesso na inserção
                            header("location: ../criarTreino.php?membro=Ombro&situacao=sucesso");
                            exit();
                        } else {
                            echo "Erro ao inserir em treino_exercicios: " . $stmt->error;
                        }
                        $stmt->close();
                    } else {
                        echo "Nenhum treino encontrado para o membro 'Ombro'.";
                    }
                } else {
                    echo "Erro ao inserir em exercicio_serieordem: " . $stmt->error;
                }
            } else {
                echo "Série não encontrada.";
            }
        } else {
            echo "Exercício não encontrado.";
        }

        // Fechando a conexão com o banco de dados.
        $conexao->close();
    }
?>