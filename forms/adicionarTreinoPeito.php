<?php
    // Conexão com o banco de dados.
    include("conexao.php");

    // Variaveis vindas do criarTreino.php.
    $ser_ordem='Desejavel';
    $exe_nome=$_POST['peito'];
    $ser_serie=$_POST['seriePeito'];

    // Comando para conectar o exercicio ao seu membro.
    $sql = "INSERT INTO series_exercicios(ser_serie, ser_ordem, exe_nome, mem_nome) VALUES ('$ser_serie','$ser_ordem','$exe_nome','Peito')";

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