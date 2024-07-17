<?php
    include("conexao.php");

    $exe_ordem='Desejavel';
    $exe_nome=$_POST['peito'];
    $exe_serie=$_POST['seriePeito'];

    $sql = "INSERT INTO exercicio(exe_ordem, exe_nome, exe_serie) VALUES ('$exe_ordem','$exe_nome','$exe_serie')";

    $sqlDois = "INSERT INTO membro_exercicio(mem_nome, exe_nome) VALUES ('Peito','$exe_nome')";

    if(mysqli_query($conexao, $sql) && mysqli_query($conexao, $sqlDois)){

    }else{
        echo "Erro".mysqli_connect_error($conexao);
    }
    mysqli_close($conexao);

    header("location: ../criarTreino.php");
?>