<?php
    if(!empty($_GET['exercicio'])){
        include_once('conexao.php');

        $exercicio = $_GET['exercicio'];

        $sqlSelect = "SELECT *  FROM exercicio WHERE exe_nome='$exercicio'";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0){
            $sqlDeleteSegundaryTable = "DELETE FROM membro_exercicio WHERE exe_nome = '$exercicio';";
            $sqlDelete = "DELETE FROM exercicio WHERE exe_nome='$exercicio'";
            $resultDeleteSegundaryTable = $conexao->query($sqlDeleteSegundaryTable);
            $resultDelete = $conexao->query($sqlDelete);
        }
        mysqli_close($conexao);
    }

    header('Location: ../criarTreino.php');
?>