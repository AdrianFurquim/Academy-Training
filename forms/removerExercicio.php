<?php
    // Verificação caso não exista nenhum exercicio.
    if(!empty($_GET['exercicio'])){
        // Conexão com o banco de dados.
        include_once('conexao.php');

        // Pegando através da URL qual exercicio deseja der excluido.
        $exercicio = $_GET['exercicio'];

        // Comando para verificar se tal exercicio existe no banco de dados.
        $sqlSelect = "SELECT *  FROM exercicio WHERE exe_nome='$exercicio'";

        // Realizando o script no banco e armazenando o resultado.
        $result = $conexao->query($sqlSelect);

        // Caso exista este exercicio.
        if($result->num_rows > 0){
            // Script para excluir o ligamento com o usuário.
            $sqlDeleteSegundaryTable = "DELETE FROM membro_exercicio WHERE exe_nome = '$exercicio';";
            // Script para excluir o exercício.
            $sqlDelete = "DELETE FROM exercicio WHERE exe_nome='$exercicio'";
            // Realizando os comandos no Banco de Dados.
            $resultDeleteSegundaryTable = $conexao->query($sqlDeleteSegundaryTable);
            $resultDelete = $conexao->query($sqlDelete);
        }
        // Fechando a conexão com o banco de dados.
        mysqli_close($conexao);
    }

    // Location para direcionamento do usuário.
    header('Location: ../criarTreino.php');
?>