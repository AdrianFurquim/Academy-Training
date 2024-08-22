<?php
    // Conexão com o banco de dados.
    include("conexao.php");

    // Variáveis vindas do editarDados.php.
    $nome = $_POST['nome'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $meta = $_POST['meta'];

    $usuario_id = isset($_GET['id']) ? $_GET['id'] : null;

    // Verificação se algum dado foi preenchido.
    if (empty($nome) && empty($altura) && empty($peso) && empty($meta)) {
        header("location: ../editaDados.php?situacaoMen=faltando&situacao=conectado&id=". $_GET['id']."");
        exit();
    } else {

        // Select específico para pegar o id do usuário existente.
        $stmt = $conexao->prepare("SELECT * FROM usuario WHERE usu_id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $usuario_id);
            $stmt->execute();
            $result_usuario_banco_esp = $stmt->get_result();
            $stmt->close();

            // Verificação para se o usuário realmente existe.
            if ($result_usuario_banco_esp->num_rows > 0) {
                $usuario_dados_antigo = $result_usuario_banco_esp->fetch_assoc();

                if (empty($nome)) {
                    $nome = $usuario_dados_antigo['usu_nome'];
                }

                if (empty($altura)) {
                    $altura = $usuario_dados_antigo['usu_altura'];
                }

                if (empty($peso)) {
                    $peso = $usuario_dados_antigo['usu_peso'];
                }

                if (empty($meta)) {
                    $meta = $usuario_dados_antigo['usu_meta'];
                }

                // Preparar a declaração SQL para evitar SQL Injection
                $stmt = $conexao->prepare("UPDATE usuario SET usu_nome=?, usu_altura=?, usu_peso=?, usu_meta=? WHERE usu_id = ?");
                if ($stmt) {
                    $stmt->bind_param("ssdsi", $nome, $altura, $peso, $meta, $usuario_id);
        
                    // Executar a consulta
                    if ($stmt->execute()) {
                        header("location: ../login.php?situacaoMen=sucesso&situacao=conectado&id=". $_GET['id']."");
                    } else {
                        header("location: ../login.php?situacaoMen=deuRuim&situacao=conectado&id=". $_GET['id']."");
                    }
        
                    // Fechar a declaração
                    $stmt->close();
                } else {
                    // Em caso de erro na preparação da declaração
                    echo "Erro na preparação da declaração SQL: " . $conexao->error;
                }

            } else {
                // Em caso de usuário não encontrado
                echo "Usuário não encontrado.";
            }

        } else {
            // Em caso de erro na preparação da declaração de SELECT
            echo "Erro na preparação da declaração SQL: " . $conexao->error;
        }

    }

    // Fechar a conexão com o banco de dados
    $conexao->close();
?>
