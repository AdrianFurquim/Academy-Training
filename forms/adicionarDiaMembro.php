<?php
    // Conexão com o banco de dados.
    include("conexao.php");

    // Variáveis vindas do criarTreino.php.
    $dia = isset($_POST['dia']) ? $_POST['dia'] : null;
    $membro = isset($_POST['membro_treino']) ? $_POST['membro_treino'] : null;
    $usuario_id = isset($_GET['id']) ? $_GET['id'] : null;

    // Verificação se as váriaveis não estão vazias
    if (empty($dia) || empty($membro)) {
        // Caso o usuário não tenha selecionado as duas opções.
        header("location: ../organizarDiasMembros.php?situacaoMen=dadosFaltando&situacao=conectado&id=$usuario_id");
    } else {

        // Consulta no banco de dados para verificar se o dia com o respectivo membro já existe nos dados do usuário.
        $stmt = $conexao->prepare("SELECT 
            DISTINCT t.dia_nome AS Dia,
            t.membro_nome AS Membro, 
            t.tre_id AS TreinoId, 
            te.tre_exe_id AS TreExeId
        FROM 
            usuario u
        JOIN 
            treino_exercicios te ON u.usu_id = te.usuario_id
        JOIN 
            treinos t ON te.treino_id = t.tre_id
        WHERE 
            u.usu_id = ? AND t.membro_nome = ? AND t.dia_nome = ?");
        $stmt->bind_param("iss", $usuario_id, $membro, $dia);
        $stmt->execute();
        $result_treinos_banco_esp = $stmt->get_result();
        $stmt->close();

        // Caso não exista nenhuma resposta, significa que o usuário não possui este dia com este exercício.
        if ($result_treinos_banco_esp->num_rows <= 0) {
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
            // Caso dê errado o INSERT ao Banco de dados.
            header("location: ../organizarDiasMembros.php?situacaoMen=errou&situacao=conectado&id=$usuario_id");
        }else{
            // Caso já exista o dia treino no banco do usuário, retorna a URL como Organização Já Existênte.
            header("location: ../organizarDiasMembros.php?situacaoMen=orgExistente&situacao=conectado&id=$usuario_id");
        }


    }
    
?>
