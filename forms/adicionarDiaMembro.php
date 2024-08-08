<?php
    // Conexão com o banco de dados.
    include("conexao.php");

    // Variáveis vindas do criarTreino.php.
    $dia = $_POST['dia'];
    $membro = $_POST['membro_treino'];

    if ($dia == "" || $membro == "") {
        header("location: ../organizarDiasMembros.php?situacao=caiunoinicio");
    } else {
        // Consulta de verificação.
        // $select_verificacao = "SELECT mt.treino_dia, mt.mem_nome
        //                     FROM usuario u
        //                     JOIN usuario_treino ut ON u.usu_id = ut.usu_id
        //                     JOIN membro_treino mt ON ut.treino_dia = mt.treino_dia
        //                     WHERE u.usu_id = 1";
        
        $insert_comando = "INSERT INTO membro_treino(treino_dia, mem_nome) VALUES ('$dia','$membro')";

        $select_result = $conexao->query($select_verificacao);

        $select_user_data_array = [];
        while ($user_data = mysqli_fetch_assoc($select_result)) {
            $select_user_data_array[] = $user_data;
        }

        $verific_cond = false;

        foreach ($select_user_data_array as $user_data) {
            if ($user_data['treino_dia'] === $dia && $user_data['mem_nome'] === $membro) {
                $verific_cond = true;
                break;
            }
        }

        if ($verific_cond == false) {
            // Executando script no banco e verificando a ocorrência de erros.
            if (mysqli_query($conexao, $insert_comando)) {
                // Fechando a conexão com o banco de dados.
                mysqli_close($conexao);
                
                // Redirecionando o usuário.
                header("location: ../organizarDiasMembros.php");
            } else {
                echo "Erro: " . mysqli_error($conexao);
            }
        } else {
            header("location: ../organizarDiasMembros.php?situacao=jaexistente");
        }
    }
?>
