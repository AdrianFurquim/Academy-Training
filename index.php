<?php
    include("forms/conexao.php");

    // Comando SQL para resgatar dados do treino de Terça-Feira ================================================================================
    $treino = "SELECT 
        u.usu_nome AS Usuario,
        t.dia_nome AS Dia,
        t.membro_nome AS Membro,
        e.exe_nome AS Exercício,
        so.ser_serie AS Serie
    FROM 
        usuario u
    JOIN 
        treino_exercicios te ON u.usu_id = te.usuario_id
    JOIN 
        treinos t ON te.treino_id = t.tre_id
    JOIN 
        exercicio_serieordem eso ON te.exercicio_serie_id = eso.exe_ser_id
    JOIN 
        exercicio e ON eso.exercicio_id = e.exe_id
    JOIN 
        serie_ordem so ON eso.serie_id = so.ser_id
    WHERE 
        u.usu_id = 1;";

    // Comando SQL para resgatar dados do treino de membros que o usuário possui ================================================================================
    $dia_treinamento = "SELECT DISTINCT t.dia_nome
        FROM treinos t
        JOIN treino_exercicios te ON t.tre_id = te.treino_id
        WHERE te.usuario_id = 1;";

    // Comando SQL para resgatar dados do treino de membros seus respectivos dias ================================================================================
    $sql_treino_membro = "SELECT DISTINCT t.dia_nome, t.membro_nome
        FROM treinos t
        JOIN treino_exercicios te ON t.tre_id = te.treino_id
        WHERE te.usuario_id = 1;";

    // // Salvando resultados das consultas =========================================================================================================
    $result=$conexao->query($treino);
    $resultDiaTreino=$conexao->query($dia_treinamento);
    $resultTreinoMembro=$conexao->query($sql_treino_membro);

    // // Incerindo Geral em um array para poder gerar varios elementos nas tabelas =================================================================
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
                if($user_data_membro['dia_nome'] ==  $dia_treino) {

                    // Verificação para se o dia de treinamento esteja no lugar correto.
                    if($user_data['dia_nome'] ==  $dia_treino) {

                        // Escrevendo os dados na tela do PHP.
                        echo "<tr>";
                            echo "<th scope='row' colspan='3'>".$user_data_membro['membro_nome']."</th>";
                        echo "</tr>";

                        // Foreach para escrever os dados que contem no dia selecionado.
                        foreach($user_data_array as $user_data_exercicio) {

                            // Verificação para se o membro do exercício bate com o membro do dia.
                            if ($user_data_membro['membro_nome'] == $user_data_exercicio['Membro']) {

                                // Escrevendo os dados na tela do PHP.
                                echo "<tr>";
                                    echo "<td><input type='checkbox'>Escolha</td>";
                                    echo "<td>".$user_data_exercicio['Exercício']."</td>";
                                    echo "<td>".$user_data_exercicio['Serie']."</td>";                        
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
    <link rel="stylesheet" href="./assets/css/style7.css">
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