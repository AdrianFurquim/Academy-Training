<?php
    // Verificação caso não exista nenhum exercicio ou membro.
    if (isset($_GET['treinoId']) && isset($_GET['exercicioId']) && isset($_GET['membro'])) {
        // Conexão com o banco de dados.
        include_once('conexao.php');
    
        // Sanitização dos dados recebidos via GET
        $id_treino = intval($_GET['treinoId']);
        $id_exercicio = intval($_GET['exercicioId']);
        $membro = htmlspecialchars($_GET['membro']);
    
        // Deletando dados da tabela treino_exercicios.
        $delete_treino = "DELETE FROM treino_exercicios WHERE tre_exe_id = $id_treino";
        if ($conexao->query($delete_treino) === TRUE) {
            echo "Exercício excluído com sucesso da tabela treino_exercicios.";
        } else {
            echo "Erro ao excluir exercício da tabela treino_exercicios: " . $conexao->error;
        }
        
        // Deletando exercicio da tabela exercicio_serieordem.
        $delete_exercicio = "DELETE FROM exercicio_serieordem WHERE exe_ser_id = $id_exercicio";
        if ($conexao->query($delete_exercicio) === TRUE) {
            echo "Exercício excluído com sucesso da tabela exercicio_serieordem.";
        } else {
            echo "Erro ao excluir exercício da tabela exercicio_serieordem: " . $conexao->error;
        }

        // Fechando a conexão com o banco de dados.
        mysqli_close($conexao);
    }
    
    // Location para direcionamento do usuário.
    header("location: ../criarTreino.php?membro=$membro");
?>