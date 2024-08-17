<?php

    // Conexão com o banco de dados.
    include("conexao.php");

    // Pegando os nomes dos selects para realizar o POST conforme cada membro.
    $select = isset($_GET['select']) ? $_GET['select'] : null;
    $serie = isset($_GET['serie']) ? $_GET['serie'] : null;

    // Pegando os valores reais tanto da URL quanto do Formulário.
    $exe_nome = isset($_POST[$select]) ? $_POST[$select] : null;
    $ser_serie = isset($_POST[$serie]) ? $_POST[$serie] : null;
    $usuario_id = isset($_GET['id']) ? $_GET['id'] : null;
    $membro = isset($_GET['membro']) ? $_GET['membro'] : null;

    // Verificação se $exe_nome, $ser_serie e $membro foram escolhidos.
    if (empty($exe_nome) || empty($ser_serie) || empty($membro)) {
        header("location: ../criarTreino.php?membro=$membro&situacaoMen=faltando&situacao=conectado&id=". $_GET['id']."");
        exit();
    } else {
        // Select específico para pegar o id do exercício existente.
        $stmt = $conexao->prepare("SELECT exe_id FROM exercicio WHERE exe_nome = ?");
        $stmt->bind_param("s", $exe_nome);
        $stmt->execute();
        $result_exercicios_banco_esp = $stmt->get_result();
        $stmt->close();

        // Verificação para se o exercício escolhido realmente existe.
        if ($result_exercicios_banco_esp->num_rows > 0) {
            $exercicio = $result_exercicios_banco_esp->fetch_assoc();
            $exercicio_id = $exercicio['exe_id'];

            // Select específico para pegar o id da série existente.
            $stmt = $conexao->prepare("SELECT ser_id FROM serie_ordem WHERE ser_serie = ?");
            $stmt->bind_param("s", $ser_serie);
            $stmt->execute();
            $result_series_banco = $stmt->get_result();
            $stmt->close();

            // Verificação para se a série escolhida realmente existe.
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
                    $stmt = $conexao->prepare("SELECT 
                        te.tre_exe_id,
                        t.membro_nome,
                        u.usu_id
                    FROM treino_exercicios te
                    INNER JOIN treinos t ON te.treino_id = t.tre_id
                    INNER JOIN usuario u ON te.usuario_id = u.usu_id
                    WHERE u.usu_id = ? AND t.membro_nome = ?");
                    $stmt->bind_param("is", $usuario_id, $membro);
                    $stmt->execute();
                    $result_treino = $stmt->get_result();
                    $stmt->close();

                    // Verificação para se usuário possui o membro com algum dia em sua lista.
                    if ($result_treino->num_rows > 0) {
                        $treino = $result_treino->fetch_assoc();
                        $treino_id = $treino['tre_exe_id'];

                        // Inserção na tabela lig_treino_exercicios.
                        $stmt = $conexao->prepare("INSERT INTO lig_treino_exercicios(exercicio_serie_id, treino_exercicio_id) VALUES (?, ?)");
                        $stmt->bind_param("ii", $exercicio_serie_id, $treino_id);
                        if ($stmt->execute()) {
                            // Sucesso na inserção.
                            header("location: ../criarTreino.php?membro=$membro&situacaoMen=sucesso&situacao=conectado&id=$usuario_id");
                            exit();
                        } else {
                            echo "Erro ao inserir em treino_exercicios: " . $stmt->error;
                        }
                        $stmt->close();
                    } else {
                        header("location: ../criarTreino.php?membro=$membro&situacaoMen=semOrgMen&situacao=conectado&id=$usuario_id");
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
