<?php
    // Conexão com o banco de dados.
    include("conexao.php");

    // Variáveis vindas do criarTreino.php.
    $exe_nome = $_POST['peito'];
    $ser_serie = $_POST['seriePeito'];

    // Verificação se $exe_nome e $ser_serie foram escolhidos.
    if ($exe_nome == "" || $ser_serie == "") {
        header("location: ../criarTreino.php?membro=Peito&situacao=faltando");
    } else {
        $exercicios_banco = "SELECT * FROM exercicio";
        $result_exercicios_banco = $conexao->query($exercicios_banco);

        $series_banco = "SELECT * FROM serie_ordem";
        $result_series_banco = $conexao->query($series_banco);

        foreach ($result_exercicios_banco as $array_banco_exercicio) {
            if ($array_banco_exercicio['exe_nome'] == $exe_nome) {
                foreach ($result_series_banco as $array_banco_serie) {
                    if ($array_banco_serie['ser_serie'] == $ser_serie) {
                        $insert_exercicio_serie = "INSERT INTO exercicio_serieordem (`exercicio_id`, `serie_id`) VALUES ('$array_banco_exercicio[exe_id]', '$array_banco_serie[ser_id]')";

                        if (mysqli_query($conexao, $insert_exercicio_serie)) {
                            // Obtém o ID do exercício_série recém-inserido
                            $exercicio_serie_id = mysqli_insert_id($conexao);

                            // Insere na tabela treino_exercicios
                            $insert_treino_exercicios = "INSERT INTO treino_exercicios (`usuario_id`, `treino_id`, `exercicio_serie_id`) VALUES ('1', '1', '$exercicio_serie_id')";
                            
                            if (mysqli_query($conexao, $insert_treino_exercicios)) {
                                // Sucesso na inserção
                            } else {
                                echo "Erro ao inserir em treino_exercicios: " . mysqli_error($conexao);
                            }
                        } else {
                            echo "Erro ao inserir em exercicio_serieordem: " . mysqli_error($conexao);
                        }
                    }
                }
            }
        }

        // Fechando a conexão com o banco de dados.
        mysqli_close($conexao);

        // Redirecionando o usuário.
        header("location: ../criarTreino.php?membro=Peito");
    }
?>
