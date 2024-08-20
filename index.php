<?php
    include("forms/conexao.php");

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $usuario_id = $_GET['id'];
        
        // Comando SQL para resgatar dados do treino de Terça-Feira ================================================================================
        $treino2 = "SELECT 
            u.usu_nome AS Usuário,
            e.exe_nome AS Exercício,
            m.mem_nome AS Membro,
            d.dia_nome AS Dia, 
            se.ser_serie AS Serie
        FROM treino_exercicios te
        INNER JOIN lig_treino_exercicios lte ON te.tre_exe_id = lte.treino_exercicio_id
        INNER JOIN exercicio_serieordem eso ON lte.exercicio_serie_id = eso.exe_ser_id
        INNER JOIN exercicio e ON eso.exercicio_id = e.exe_id
        INNER JOIN serie_ordem se ON eso.serie_id = se.ser_id
        INNER JOIN treinos t ON te.treino_id = t.tre_id
        INNER JOIN membros m ON t.membro_nome = m.mem_nome
        INNER JOIN dias d ON t.dia_nome = d.dia_nome
        INNER JOIN usuario u ON te.usuario_id = u.usu_id
        WHERE u.usu_id = $usuario_id;";
    
        // Comando SQL para resgatar dados do treino de membros que o usuário possui ================================================================================
        $dia_treinamento = "SELECT DISTINCT t.dia_nome
            FROM treinos t
            JOIN treino_exercicios te ON t.tre_id = te.treino_id
            WHERE te.usuario_id = $usuario_id;";
    
        // Comando SQL para resgatar dados do treino de membros seus respectivos dias ================================================================================
        $sql_treino_membro = "SELECT DISTINCT t.dia_nome, t.membro_nome
            FROM treinos t
            JOIN treino_exercicios te ON t.tre_id = te.treino_id
            WHERE te.usuario_id = $usuario_id;";
    
        // // Salvando resultados das consultas =========================================================================================================
        $result=$conexao->query($treino2);
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
    }

    // Função para gerar tabelas.
    function gerarTabelaTreino($user_data_array_dia_treinamento, $user_data_array_treino_membro, $user_data_array, $dia_treino) {

        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $existTraining = false;
    
            // Foreach para rodar os dias de treino que foram selecionados.
            foreach($user_data_array_dia_treinamento as $user_data) {
                if($user_data['dia_nome'] ==  $dia_treino) {
    
                    // Foreach para pegar os valores de todos os treinos e seus respectivos membros.
                    foreach($user_data_array_treino_membro as $user_data_membro) {
                        if($user_data_membro['dia_nome'] ==  $dia_treino) {
    
                            // Verifica se há membros e exercícios para o dia específico.
                            echo "<tr>";
                            echo "<th scope='row' colspan='3'>".$user_data_membro['membro_nome']."</th>";
                            echo "</tr>";
    
                            foreach($user_data_array as $user_data_exercicio) {
                                if ($user_data_membro['membro_nome'] == $user_data_exercicio['Membro']) {
                                    echo "<tr>";
                                    echo "<td><input type='checkbox'>Escolha</td>";
                                    echo "<td>".$user_data_exercicio['Exercício']."</td>";
                                    echo "<td>".$user_data_exercicio['Serie']."</td>";                        
                                    echo "</tr>";
                                    $existTraining = true;
                                }
                            }
                        }
                    }
                }
            }
    
            // Caso não exista nenhum treino para aquele dia.
            if (!$existTraining) {
                echo "<tr>";
                echo "<th scope='row' colspan='3'>Sem treino</th>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo "<th scope='row' colspan='3'>ID de usuário inválido</th>";
            echo "</tr>";
        }
    }

    // Carregando Id do usuário pela URL ========================================================================================================
    // Function para gerar os links dos caminhos da barra nav.
    function gerarLink($caminho){

        // Switch para diferenciar o que o usuário quer.
        switch ($caminho) {

            // Criar Treino ===================================================================================
            case 'criarTreino':
                // If para verificar se situação existe.
                if (isset($_GET['situacao'])) {
                    $situacao = $_GET['situacao'];

                    // If para ver se o usuário esta logado.
                    if ($situacao == "conectado") {
                        echo "<a href='criarTreino.php?situacao=conectado&id=". $_GET['id']."'>";
                    }else{
                        echo "<a href='criarTreino.php'>";
                    }
                }else{
                    echo "<a href='criarTreino.php'>";
                }
                break;

            // Index ==========================================================================================
            case 'index':

                // If para verificar se situação existe.
                if (isset($_GET['situacao'])) {
                    $situacao = $_GET['situacao'];

                    // If para ver se o usuário esta logado.
                    if ($situacao == "conectado") {
                        echo "<a href='index.php?situacao=conectado&id=". $_GET['id']."' class='meus_treinos_link'>";
                    }else{
                        echo "<a href='index.php' class='meus_treinos_link'>";
                    }
                }else{
                    echo "<a href='index.php' class='meus_treinos_link'>";
                }
                break;

            // Login ==========================================================================================
            case 'login':

                // If para verificar se situação existe.
                if (isset($_GET['situacao'])) {
                    $situacao = $_GET['situacao'];
                    
                    // If para ver se o usuário esta logado.
                    if ($situacao == "conectado") {
                        echo "<a href='login.php?situacao=conectado&id=". $_GET['id']."' class='login_link'>";
                    }else{
                        echo "<a href='login.php' class='login_link'>";
                    }
                }else{
                    echo "<a href='login.php' class='login_link'>";
                }
                break;
                
            // Caso não exista tal condição ====================================================================
            default:
                echo "inexistente";
                break;
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
    <link rel="stylesheet" href="./assets/css/style12.css">

    <style>
        <?php
            if (isset($_GET['situacao'])) {
                $situacao = $_GET['situacao'];

                // If para ver se o usuário esta logado.
                if ($situacao == "conectado") {
                    echo ".conteiner_nao_logado { display: none; }";
                    echo ".conteiner_dia_treino { display: block; }";
                }else{
                    echo ".conteiner_nao_logado { display: block; }";
                    echo ".conteiner_dia_treino { display: none; }";
                }
            }else{
                echo ".conteiner_nao_logado { display: block; }";
                echo ".conteiner_dia_treino { display: none; }";
            }
        ?>
    </style>

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
            <?php
                gerarLink('criarTreino');
            ?>
                <div class="criar_treino">+</div>
            </a>
            <?php
                gerarLink('index');
            ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                </svg>
            </a>
            <?php
                gerarLink('login');
            ?>
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

    <section class="conteiner_nao_logado">
        <img src="assets/img/logo.JPG" alt="Desenho de um halter de acadêmia e o nome: Academy Training">
        <div>
            <h2>Para ver seu treino, faça o login</h2>
            <a href="login.php">
                <button>Login</button>    
            </a>
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
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                    echo gerarTabelaTreino($user_data_array_dia_treinamento, $user_data_array_treino_membro, $user_data_array, "Segunda-Feira");
                }
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
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                    echo gerarTabelaTreino($user_data_array_dia_treinamento, $user_data_array_treino_membro, $user_data_array, "Terça-Feira");
                }
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
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                    echo gerarTabelaTreino($user_data_array_dia_treinamento, $user_data_array_treino_membro, $user_data_array, "Quarta-Feira");
                }
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
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                    echo gerarTabelaTreino($user_data_array_dia_treinamento, $user_data_array_treino_membro, $user_data_array, "Quinta-Feira");
                }
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
            <?php
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                    echo gerarTabelaTreino($user_data_array_dia_treinamento, $user_data_array_treino_membro, $user_data_array, "Sexta-Feira");
                }
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
            <?php
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                    echo gerarTabelaTreino($user_data_array_dia_treinamento, $user_data_array_treino_membro, $user_data_array, "Sábado");
                }
            ?>
            </tbody>
        </table>
    </section>

    

    <script src="./assets/js/script1.js"></script>
</body>
</html>