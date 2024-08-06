<?php
    // Conexão com o banco de dados.
    include("conexao.php");

    // Variaveis vindas do criarTreino.php.
    $exe_nome=$_POST['abdomen'];
    $ser_serie=$_POST['serieAbdomen'];

    // Verificação se $exe_nome e $ser_serie foram escolhidos.
    if ($exe_nome == "" || $ser_serie == "") {
        header("location: ../criarTreino.php?membro=Abdominal&situacao=faltando");
    } else {
        // Select em todos os exercicios existentes.
        $exercicios_banco = "SELECT * FROM exercicio";
        $result_exercicios_banco = $conexao->query($exercicios_banco);

        // Select em todos os tipos de series e ordens existentes.
        $series_banco = "SELECT * FROM serie_ordem";
        $result_series_banco = $conexao->query($series_banco);

        // Rodando todos os exercícios do banco.
        foreach ($result_exercicios_banco as $array_banco_exercicio) {
            // Verificando se existe o exercício selecionado existem.
            if ($array_banco_exercicio['exe_nome'] == $exe_nome) {
                // Rodando todas as séries e ordens do banco.
                foreach ($result_series_banco as $array_banco_serie) {
                    // Verificando se existe a série e ordem selecionados existem.
                    if ($array_banco_serie['ser_serie'] == $ser_serie) {
                        // Comando para inserir o exercicio no exercicio_serieoredem.
                        $insert_exercicio_serie = "INSERT INTO exercicio_serieordem (`exercicio_id`, `serie_id`) VALUES ('$array_banco_exercicio[exe_id]', '$array_banco_serie[ser_id]')";

                        if (mysqli_query($conexao, $insert_exercicio_serie)) {
                            // Obtém o ID do exercício_série recém-inserido.
                            $exercicio_serie_id = mysqli_insert_id($conexao);

                            // Insere na tabela treino_exercicios.
                            $insert_treino_exercicios = "INSERT INTO treino_exercicios (`usuario_id`, `treino_id`, `exercicio_serie_id`) VALUES ('1', '3', '$exercicio_serie_id')";
                            
                            if (mysqli_query($conexao, $insert_treino_exercicios)) {
                                // Sucesso na inserção.
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
    
        // Location para direcionamento do usuário.
        header("location: ../criarTreino.php?membro=Abdominal");
    }
?>