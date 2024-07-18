<?php
    // Conexão com o banco de dados.
    include("conexao.php");

    // Variaveis vindas do criarTreino.php.
    $exe_ordem='Desejavel';
    $exe_nome=$_POST['triceps'];
    $exe_serie=$_POST['serieTriceps'];

    // Comando para inserir o exercicio no banco de dados.
    $sql = "INSERT INTO exercicio(exe_ordem, exe_nome, exe_serie) VALUES ('$exe_ordem','$exe_nome','$exe_serie')";

    // Comando para conectar o exercicio ao seu membro.
    $sqlDois = "INSERT INTO membro_exercicio(mem_nome, exe_nome) VALUES ('Tríceps','$exe_nome')";

    // Execultando script no banco, e ferificando a ocorrencia de erros.
    if(mysqli_query($conexao, $sql) && mysqli_query($conexao, $sqlDois)){

    }else{
        echo "Erro".mysqli_connect_error($conexao);
    }
    // Fechando a conexão com o banco de dados.
    mysqli_close($conexao);

    // Location para direcionamento do usuário.
    header("location: ../criarTreino.php");
?>