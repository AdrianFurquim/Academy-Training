<?php
    // Verificação caso não exista nenhum exercicio ou membro.
    if(isset($_GET['exercicio']) && isset($_GET['membro'])){
        // Conexão com o banco de dados.
        include_once('conexao.php');

        // A partir deste momento do novo banco de dados, você tem que realizar mais 2 delete no banco de dados em treino_exercicio, e exercicio_serie_ordem

        // Pegando através da URL qual exercício deseja der excluido, e qual o membro do exercício.
        $exercicio = $_GET['exercicio'];
        $membro = $_GET['membro'];

        // Comando para verificar se tal exercicio existe no banco de dados.
        $sqlSelect = "SELECT * FROM series_exercicios WHERE exe_nome='$exercicio'";

        // Realizando o script no banco e armazenando o resultado.
        $result = $conexao->query($sqlSelect);

        // Caso exista este exercicio.
        if($result->num_rows > 0){
            // Script para excluir o ligamento com o usuário.
            $sqlDelete = "DELETE FROM series_exercicios WHERE exe_nome = '$exercicio';";
            // Realizando os comandos no Banco de Dados.
            $resultDelete = $conexao->query($sqlDelete);
        }
        // Fechando a conexão com o banco de dados.
        mysqli_close($conexao);
    }

    // Location para direcionamento do usuário.
    header("location: ../criarTreino.php?membro=$membro");
?>