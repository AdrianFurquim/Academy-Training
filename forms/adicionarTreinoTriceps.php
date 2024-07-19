<?php
    // Conexão com o banco de dados.
    include("conexao.php");

    // Variaveis vindas do criarTreino.php.
    $exe_ordem='Desejavel';
    $exe_nome=$_POST['triceps'];
    $exe_serie=$_POST['serieTriceps'];

    // Comando para inserir o exercicio no banco de dados.
    $sql = "INSERT INTO series_exercicios(ser_serie, ser_ordem, exe_nome, mem_nome) VALUES ('$ser_serie','$ser_ordem','$exe_nome','Tríceps')";

    // Execultando script no banco, e ferificando a ocorrencia de erros.
    if(mysqli_query($conexao, $sql)){

    }else{
        echo "Erro".mysqli_connect_error($conexao);
    }
    // Fechando a conexão com o banco de dados.
    mysqli_close($conexao);

    // Location para direcionamento do usuário.
    header("location: ../criarTreino.php");
?>