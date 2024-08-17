<?php
    // Verificação caso não exista nenhum exercicio ou membro.
    if (isset($_GET['TreinoId']) && isset($_GET['TreExeId']) && isset($_GET['id'])) {
        // Conexão com o banco de dados.
        include_once('conexao.php');

        // Configurando o MySQLi para lançar exceções em vez de warnings.
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        try {
            // Recebendo Variáveis pelo URL.
            $TreinoId = intval($_GET['TreinoId']);
            $TreExeId = intval($_GET['TreExeId']);
            $usuario_id = intval($_GET['id']);
            $membro = $_GET['membro'];

            // Iniciando uma transação.
            $conexao->begin_transaction();

            // Deletando dados da tabela treino_exercicios.
            $delete_treino_exercicios = "DELETE FROM treino_exercicios WHERE tre_exe_id = ?";
            $stmt = $conexao->prepare($delete_treino_exercicios);
            $stmt->bind_param("i", $TreExeId);
            $stmt->execute();

            // Deletando dados da tabela treinos.
            $delete_treinos = "DELETE FROM treinos WHERE tre_id = ?";
            $stmt = $conexao->prepare($delete_treinos);
            $stmt->bind_param("i", $TreinoId);
            $stmt->execute();

            // Comitando a transação.
            $conexao->commit();

            // Redirecionamento em caso de sucesso
            header("location: ../organizarDiasMembros.php?situacaoMen=sucesso&situacao=conectado&id=$usuario_id");
        } catch (mysqli_sql_exception $exception) {
            // Em caso de erro, realiza rollback e redireciona para a pagina do membro do usuário.
            $conexao->rollback();
            header("location: ../criarTreino.php?membro=$membro&situacaoMen=excluirExes&situacao=conectado&id=$usuario_id");
            exit();

        } finally {
            // Fechando a conexão com o banco de dados.
            $stmt->close();
            $conexao->close();
        }
    } else {
        header("location: ../organizarDiasMembros.php?situacaoMen=erro1&situacao=conectado&id=" . urlencode($usuario_id));
    }

?>