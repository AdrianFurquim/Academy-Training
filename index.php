<?php
    include("forms/conexao.php");

    // Comando SQL para resgatar dados do treino de Terça-Feira ================================================================================
    $treino = "SELECT 
        ut.treino_dia,
        mt.mem_nome,
        se.exe_nome,
        se.ser_serie,
        se.ser_ordem
    FROM 
        usuario u
    JOIN 
        usuario_treino ut ON u.usu_id = ut.usu_id
    JOIN 
        membro_treino mt ON ut.treino_dia = mt.treino_dia
    JOIN 
        series_exercicios se ON mt.mem_nome = se.mem_nome
    WHERE 
        u.usu_id = 1
    ORDER BY 
        CASE mt.mem_nome
            WHEN 'Peito' THEN 1
            WHEN 'Tríceps' THEN 2
            WHEN 'Abdominal' THEN 3
            WHEN 'Costa' THEN 4
            WHEN 'Bíceps' THEN 5
            WHEN 'Ombro' THEN 6
            WHEN 'Membros Inferiores' THEN 7
            ELSE 8
        END
    ";

    // Comando SQL para resgatar dados do treino de membros que o usuário possui ================================================================================
    $dia_treinamento = "SELECT 
        ut.treino_dia
    FROM 
        usuario_treino ut
    JOIN 
        membro_treino mt ON ut.treino_dia = mt.treino_dia
    WHERE 
        ut.usu_id = 1
    GROUP BY 
        ut.treino_dia
    ORDER BY 
        ut.treino_dia;";

    // Comando SQL para resgatar dados do treino de membros seus respectivos dias ================================================================================
    $sql_treino_membro = "SELECT 
        ut.treino_dia,
        mt.mem_nome
    FROM 
        usuario_treino ut
    JOIN 
        membro_treino mt ON ut.treino_dia = mt.treino_dia
    WHERE 
        ut.usu_id = 1
    ORDER BY 
        ut.treino_dia, mt.mem_nome;";

    // Salvando resultados das consultas =========================================================================================================
    $result=$conexao->query($treino);
    $resultDiaTreino=$conexao->query($dia_treinamento);
    $resultTreinoMembro=$conexao->query($sql_treino_membro);

    // Incerindo Geral em um array para poder gerar varios elementos nas tabelas =================================================================
    $user_data_array = [];
    while($user_data = mysqli_fetch_assoc($result)){
        $user_data_array[] = $user_data;
    }

    $user_data_array_dia_treinamento = [];
    while($user_data = mysqli_fetch_assoc($resultDiaTreino)){
        $user_data_array_dia_treinamento[] = $user_data;
    }

    $user_data_array_treino_membro = [];
    while($user_data = mysqli_fetch_assoc($resultTreinoMembro)){
        $user_data_array_treino_membro[] = $user_data;
    }

    // Função para gerar tabelas.
    function gerarTabelaTreino($user_data_array_dia_treinamento, $user_data_array_treino_membro, $user_data_array, $dia_treino) {
        // Verificação caso não exista nada na tabela.
        $existTraining = false;

        // Foreach para rodas os dias de treino que foram selecionados.
        foreach($user_data_array_dia_treinamento as $user_data) {
            
            // Foreach para pegar os valores de todos os treinos e seus respectivos membros.
            foreach($user_data_array_treino_membro as $user_data_membro) {

                // Verificação para se os dados batem com o que foi pedido.
                if($user_data_membro['treino_dia'] ==  $dia_treino) {

                    // Verificação para se o dia de treinamento esteja no lugar correto.
                    if($user_data['treino_dia'] ==  $dia_treino) {

                        // Escrevendo os dados na tela do PHP.
                        echo "<tr>";
                            echo "<th scope='row' colspan='3'>".$user_data_membro['mem_nome']."</th>";
                        echo "</tr>";

                        // Foreach para escrever os dados que contem no dia selecionado.
                        foreach($user_data_array as $user_data_exercicio) {

                            // Verificação para se o membro do exercício bate com o membro do dia.
                            if ($user_data_membro['mem_nome'] == $user_data_exercicio['mem_nome']) {

                                // Escrevendo os dados na tela do PHP.
                                echo "<tr>";
                                    echo "<td><input type='checkbox'>".$user_data_exercicio['ser_ordem']."</td>";
                                    echo "<td>".$user_data_exercicio['exe_nome']."</td>";
                                    echo "<td>".$user_data_exercicio['ser_serie']."</td>";                        
                                echo "</tr>";
                            }
                        }
                    }
                }
                // Mudança caso realmente não exista nada na tabela no final das contas.
                $existTraining = true;
            }
        }
        // Caso o não exista nenhum treino para aquele dia.
        if($existTraining == false) {

            echo "<tr>";
                echo "<th scope='row' colspan='3'>Sem treino</th>";
            echo "</tr>";
            return;
        }
    }

    //Fechar conexão com o Banco de Dados ========================================================================================================
    mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="theme-color" content="#FFFF00">

    <link rel="canonical" href="https://academytreining.netlify.app//">
    <link rel="manifest" href="manifest.json" />

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="adrian iOS">

    <title>Academy Training</title>
    <link rel="icon" tipe="image/ico" href="./images/icons/icon-152x152.png">
    <link rel="stylesheet" href="./assets/css/style6.css">
</head>
<body>

    <script>
        if ("serviceWorker" in navigator) {
          if (navigator.serviceWorker.controller) {
            console.log("[PWA Builder] active service worker found, no need to register");
          } else {
            // Register the service worker
            navigator.serviceWorker
              .register("pwabuilder-sw.js", {
                scope: "./"
              })
              .then(function (reg) {
                console.log("[PWA Builder] Service worker has been registered for scope: " + reg.scope);
              });
          }
        }
      </script>

    <header>
        <nav>
            <a href="criarTreino.php">
                <div class="criar_treino">+</div>
            </a>
            <a href="index.php" class="meus_treinos_link">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                </svg>
            </a>
            <a href="login.php" class="login_link">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                </svg>
            </a>
        </nav>
    </header>
    
    <section class="conteiner_dia_treino">
        <button class="button_voltar" onclick="voltar()">Voltar</button>
        <div class="buttons_dias">
            <button onclick="segunda()">Segunda</button>
            <button onclick="terca()">Terça</button>
            <button onclick="quarta()">Quarta</button>
            <button onclick="quinta()">Quinta</button>
            <button onclick="sexta()">Sexta</button>
            <button onclick="sabado()">Sabado</button>
        </div>
    </section>

    <section class="table_treinos">
        <!-- Treino de Segunda =========================================================================================================================================== -->
        <table id="table_segunda">
            <thead>
            <tr>
                <th scope="col">Ordem</th>
                <th scope="col">Exercicío</th>
                <th scope="col">Série</th>
            </tr>
            </thead>
            <tbody>
            <?php
                echo gerarTabelaTreino($user_data_array_dia_treinamento, $user_data_array_treino_membro, $user_data_array, "Segunda-Feira");
            ?>
            </tbody>
        </table>
        

        <!-- Treino de terça =========================================================================================================================================== -->
        <table id="table_terca">
            <thead>
            <tr>
                <th scope="col">Ordem</th>
                <th scope="col">Exercicío</th>
                <th scope="col">Série</th>
            </tr>
            </thead>
            <tbody>
            <?php
                echo gerarTabelaTreino($user_data_array_dia_treinamento, $user_data_array_treino_membro, $user_data_array, "Terça-Feira");
            ?>
            </tbody>
        </table>

        <!-- Treino de quarta =========================================================================================================================================== -->
        <table id="table_quarta">
            <thead>
            <tr>
                <th scope="col">Ordem</th>
                <th scope="col">Exercicío</th>
                <th scope="col">Série</th>
            </tr>
            </thead>
            <tbody>
            <?php
                echo gerarTabelaTreino($user_data_array_dia_treinamento, $user_data_array_treino_membro, $user_data_array, "Quarta-Feira");
            ?>
            </tbody>
        </table>

        <!-- Treino de Quinta =========================================================================================================================================== -->
        <table id="table_quinta">
            <thead>
            <tr>
                <th scope="col">Ordem</th>
                <th scope="col">Exercicío</th>
                <th scope="col">Série</th>
            </tr>
            </thead>
            <tbody>
            <?php
                echo gerarTabelaTreino($user_data_array_dia_treinamento, $user_data_array_treino_membro, $user_data_array, "Quinta-Feira");
            ?>
            
            </tbody>
        </table>

        <!-- Treino de Sexta =========================================================================================================================================== -->
        <table id="table_sexta">
            <thead>
            <tr>
                <th scope="col">Ordem</th>
                <th scope="col">Exercicío</th>
                <th scope="col">Série</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row" colspan="3">Sem treino</th>
            </tr>
            <?php
                echo gerarTabelaTreino($user_data_array_dia_treinamento, $user_data_array_treino_membro, $user_data_array, "Sexta-Feira");
            ?>
            </tbody>
        </table>

        <!-- Treino de Sabado =========================================================================================================================================== -->
        <table id="table_sabado">
            <thead>
            <tr>
                <th scope="col">Ordem</th>
                <th scope="col">Exercicío</th>
                <th scope="col">Série</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row" colspan="3">Sem treino</th>
            </tr>
            <?php
                echo gerarTabelaTreino($user_data_array_dia_treinamento, $user_data_array_treino_membro, $user_data_array, "Sábado");
            ?>
            </tbody>
        </table>
    </section>

    <script src="./assets/js/script1.js"></script>
</body>
</html>