<?php
    // Conexão com o banco de dados.
    include("conexao.php");

    // Variaveis vindas do criarTreino.php.
    $exe_nome=$_POST['abdomen'];
    $ser_serie=$_POST['serieAbdomen'];

    if ($exe_nome == "" || $ser_serie == "") {
        header("location: ../criarTreino.php?membro=Abdominal&situacao=faltando");
    }else{
        // Comando para verificar qual a ultima ordem de treinamento.
        $sql_consulta_ordem = "SELECT
            MAX(se.ser_ordem) AS max_ser_ordem
        FROM 
            usuario u
        JOIN 
            usuario_treino ut ON u.usu_id = ut.usu_id
        JOIN 
            membro_treino mt ON ut.treino_dia = mt.treino_dia
        JOIN 
            series_exercicios se ON mt.mem_nome = se.mem_nome
        WHERE 
            u.usu_id = 1 AND mt.mem_nome = 'Abdominal'";
    
        // Armazenando resultado do comando.
        $result_ordem = $conexao->query($sql_consulta_ordem);
    
        // Procurando para verificar se existe tal ordem e adicionando + 1.
        $row = $result_ordem->fetch_assoc();
        $max_ser_ordem = $row['max_ser_ordem'];
        $ser_ordem = $max_ser_ordem + 1;
    
        // Comando para conectar o exercicio ao seu membro.
        $sql = "INSERT INTO series_exercicios(ser_serie, ser_ordem, exe_nome, mem_nome) VALUES ('$ser_serie','$ser_ordem','$exe_nome','Abdominal')";
    
        // Execultando script no banco, e ferificando a ocorrencia de erros.
        if(mysqli_query($conexao, $sql)){
    
        }else{
            echo "Erro".mysqli_connect_error($conexao);
        }
        // Fechando a conexão com o banco de dados.
        mysqli_close($conexao);
    
        // Location para direcionamento do usuário.
        header("location: ../criarTreino.php?membro=Abdominal");
    }
?>