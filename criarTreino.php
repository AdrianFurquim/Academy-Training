<?php
    include("forms/conexao.php");

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $usuario_id = $_GET['id'];
        // Comando SQL para resgatar dados do treino ================================================================================
        $comandoTreino = "SELECT 
            u.usu_nome AS Usuário,
            e.exe_nome AS Exercício,
            m.mem_nome AS Membro,
            d.dia_nome AS Dia, 
            se.ser_serie AS Serie,
            te.tre_exe_id AS IdTreinoExercicio, 
            eso.exe_ser_id AS IdExercicio, 
            lte.lig_id AS LigExercício
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

        $treino=$conexao->query($comandoTreino);

        $user_data_array = [];
        while($user_data = mysqli_fetch_assoc($treino)){
            $user_data_array[] = $user_data;
        }
    }


    // Comando SQL para resgatar todos os exercicios ================================================================================
    $comandoExercicios = "SELECT * FROM dados_exercicio";

    // Salvando resultados das consultas =========================================================================================================
    $exercicios=$conexao->query($comandoExercicios);

    // Incerindo Geral em um array para poder gerar varios elementos nas tabelas =================================================================

    $user_data_array_exercicios = [];
    while($user_data = mysqli_fetch_assoc($exercicios)){
        $user_data_array_exercicios[] = $user_data;
    }

    // Função de gerar tabela dos exercicios que o usuário já possui. ======================================================================
    function gerarTabela($user_data_array, $membro){
        // Foreach para criar todo o array de exercicios.
        foreach($user_data_array as $user_data){
            echo "<tr>";
            // IF - ferificação para selecionar apenas os exercícios do membro escolhido.
            if($user_data['Membro'] == $membro){
                echo "<td>Des</td>";
                echo "<td>".$user_data['Exercício']."</td>";
                echo "<td>".$user_data['Serie']."</td>";
                echo "<td>
                <a href='forms/removerExercicio.php?ligId=$user_data[LigExercício]&exercicioId=$user_data[IdExercicio]&membro=$user_data[Membro]&situacao=conectado&id=". $_GET['id']."' class='remove_exercicio'>Excluir</a></td>";
            }
            echo "</tr>";
         }
    }

    // =======================================================================================================================================
    function gerarSections($user_data_array_exercicios, $membro){
        // Foreach para todos os exercicios que o usuário não selecionou.
        foreach($user_data_array_exercicios as $user_data) {
            // Ferificação para se o exercício corresponde ao membro selecionado.
            if($user_data['vis_mem_nome'] == $membro){
                echo "<option value='{$user_data['vis_exe_nome']}'>{$user_data['vis_exe_nome']}</option>";
            }
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
                
            // Login ==========================================================================================
            case 'orgMem':

                // If para verificar se situação existe.
                if (isset($_GET['situacao'])) {
                    $situacao = $_GET['situacao'];
                    
                    // If para ver se o usuário esta logado.
                    if ($situacao == "conectado") {
                        echo "<a href='OrganizarDiasMembros.php?situacao=conectado&id=". $_GET['id']."'>";
                    }else{
                        echo "<a href='OrganizarDiasMembros.php'>";
                    }
                }else{
                    echo "<a href='OrganizarDiasMembros.php'>";
                }
                break;
                
            // Caso não exista tal condição ====================================================================
            default:
                echo "inexistente";
                break;
        }
    }
    // Fechando conexão com o Banco de dados ====================================================================================================
    mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="theme-color" content="#FFFF00">
    <title>Criar Treino - Academy Training</title>
    <link rel="stylesheet" href="./assets/css/style12.css">

    <style>
        <?php
            // Verificação se existe algum valor na URL.
            if (isset($_GET['membro'])) {
                $membro = $_GET['membro'];
                $situacaoMen= $_GET['situacaoMen'];
                // Switch case para cada membro da URL.
                switch ($membro) {
                    case 'Peito':
                        echo ".escolha_membro { display: none; }";
                        echo ".form_peito { display: block; }";
                        // IF para verificação se o usuário escolheu o exercicio e a série - Peito.
                        if ($situacaoMen == "faltando") {
                            echo ".mensagem_peito { display: block; }";
                            echo ".escolha_membro { display: none; }";
                        }else{
                            echo ".mensagem_peito { display: none; }";
                            echo ".escolha_membro { display: none; }";
                        }
                        break;

                    case 'Tríceps':
                        echo ".escolha_membro { display: none; }";
                        echo ".form_triceps { display: block; }";
                        // IF para verificação se o usuário escolheu o exercicio e a série - Tríceps.
                        if ($situacaoMen == "faltando") {
                            echo ".mensagem_triceps { display: block; }";
                            echo ".escolha_membro { display: none; }";
                        }else{
                            echo ".mensagem_triceps { display: none; }";
                            echo ".escolha_membro { display: none; }";
                        }
                        break;

                    case 'Abdominal':
                        echo ".escolha_membro { display: none; }";
                        echo ".form_abdomen { display: block; }";
                        // IF para verificação se o usuário escolheu o exercicio e a série - Abdominal.
                        if ($situacaoMen == "faltando") {
                            echo ".mensagem_abdomen { display: block; }";
                            echo ".escolha_membro { display: none; }";
                        }else{
                            echo ".mensagem_abdomen { display: none; }";
                            echo ".escolha_membro { display: none; }";
                        }
                        break;

                    case 'Costa':
                        echo ".escolha_membro { display: none; }";
                        echo ".form_costa { display: block; }";
                        // IF para verificação se o usuário escolheu o exercicio e a série - Costa.
                        if ($situacaoMen == "faltando") {
                            echo ".mensagem_costa { display: block; }";
                            echo ".escolha_membro { display: none; }";
                        }else{
                            echo ".mensagem_costa { display: none; }";
                            echo ".escolha_membro { display: none; }";
                        }
                        break;

                    case 'Bíceps':
                        echo ".escolha_membro { display: none; }";
                        echo ".form_biceps { display: block; }";
                        // IF para verificação se o usuário escolheu o exercicio e a série - Bíceps.
                        if ($situacaoMen == "faltando") {
                            echo ".mensagem_biceps { display: block; }";
                            echo ".escolha_membro { display: none; }";
                        }else{
                            echo ".mensagem_biceps { display: none; }";
                            echo ".escolha_membro { display: none; }";
                        }
                        break;

                    case 'Ombro':
                        echo ".escolha_membro { display: none; }";
                        echo ".form_ombro { display: block; }";
                        // IF para verificação se o usuário escolheu o exercicio e a série - Ombro.
                        if ($situacaoMen == "faltando") {
                            echo ".mensagem_ombro { display: block; }";
                            echo ".escolha_membro { display: none; }";
                        }else{
                            echo ".mensagem_ombro { display: none; }";
                            echo ".escolha_membro { display: none; }";
                        }
                        break;

                    case 'Membros Inferiores':
                        echo ".escolha_membro { display: none; }";
                        echo ".form_mem_inferiores { display: block; }";
                        // IF para verificação se o usuário escolheu o exercicio e a série - Membros Inferiores.
                        if ($situacaoMen == "faltando") {
                            echo ".mensagem_mem_inferiores { display: block; }";
                            echo ".escolha_membro { display: none; }";
                        }else{
                            echo ".mensagem_mem_inferiores { display: none; }";
                            echo ".escolha_membro { display: none; }";
                        }
                        break;

                    default:
                        break;
                }

            }

            if (isset($_GET['situacao'])) {
                $situacao = $_GET['situacao'];

                // If para ver se o usuário esta logado.
                if ($situacao == "conectado") {
                    echo ".conteiner_nao_logado { display: none; }";
                    echo ".montando_treino { display: block; }";
                }else{
                    echo ".conteiner_nao_logado { display: block; }";
                    echo ".montando_treino { display: none; }";
                }
            }else{
                echo ".conteiner_nao_logado { display: block; }";
                echo ".montando_treino { display: none; }";
            }    
        ?>
    </style>
</head>
<body>

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

    <section class="conteiner_nao_logado">
        <img src="assets/img/logo.JPG" alt="Desenho de um halter de acadêmia e o nome: Academy Training">
        <div>
            <h2>Para ver seu treino, faça o login</h2>
            <a href="login.php">
                <button>Login</button>    
            </a>
        </div>
    </section>

    <section class="montando_treino">
    
        <div class="escolha_membro">
            <h1 class="mensagem_membro">Escolha o membro desejado:</h1>
            <button onclick="membroEscolhido('peito')">Peito</button>
            <button onclick="membroEscolhido('triceps')">Tríceps</button>
            <button onclick="membroEscolhido('abdomen')">Abdomen</button>
            <button onclick="membroEscolhido('costas')">Costa</button>
            <button onclick="membroEscolhido('biceps')">Bíceps</button>
            <button onclick="membroEscolhido('ombro')">Ombro</button>
            <button onclick="membroEscolhido('mem_inferiores')">Membros inferiores</button>
            <?php
                gerarLink('orgMem');
            ?>
                <button class="organizar_dias_membros">Organizar Dias e Membros</button>
            </a>
        </div>

        <div class="form_peito">
            <button onclick="diaVoltar()">Voltar</button>
            <h1>Peito</h1>
            
            <form action="forms/adicionarTreino.php?membro=Peito&select=peito&serie=seriePeito&situacao=conectado&id=<?php echo $_GET['id']; ?>" method="POST" id="adicionarTreinoPeito">
                <p class="mensagem_peito">Porfavor, selecione o exercício e a série.</p>
                <label for="peito">Exercício: </label>
                <select name="peito" id="peito">
                    <option value="">--</option>
                    <?php
                        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                            echo gerarSections($user_data_array_exercicios, 'Peito');
                        }
                    ?>
                </select><br>
                <label for="seriePeito">Série: </label>
                <select name="seriePeito" id="seriePeito">
                    <option value="">--</option>
                    <option value="3 x 10">3 x 10</option>
                    <option value="3 x 12">3 x 12</option>
                    <option value="4 x 10">4 x 10</option>
                    <option value="4 x 12">4 x 12</option>
                    <option value="Desejado">Desejado</option>
                </select>
                <table id="table_exericios">
                    <caption>
                    </caption>
                    <thead>
                    <tr>
                        <th scope="col">Ordem</th>
                        <th scope="col">Exercicío</th>
                        <th scope="col">Série</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody id="corpoTabelaPeito">
                    <tr>
                        <th scope="row" colspan="4">Peitoral</th>
                    </tr>
                    <?php
                        if (isset($_GET['id']) && is_numeric($_GET['id'])) {                  
                            echo gerarTabela($user_data_array, "Peito");
                        }else{
                            echo "<tr>";
                                echo "<th scope='row' colspan='4'>Por favor, realize o Login</th>";
                            echo "</tr>";
                        }
                    ?>
                    </tbody>
                </table>
                <button id="btnSalvarExercicioPeito" type="submit">Adicionar Exercicío</button><br>
            </form>
        </div>

        <div class="form_triceps">
            <button onclick="diaVoltar()">Voltar</button>
            <h1>Tríceps</h1>
            <form action="forms/adicionarTreino.php?membro=Tríceps&select=triceps&serie=serieTriceps&situacao=conectado&id=<?php echo $_GET['id']; ?>" method="POST" id="adicionarTreinoTriceps">
                <p class="mensagem_triceps">Porfavor, selecione o exercício e a série.</p>
                <label for="triceps">Exercício: </label>
                <select name="triceps" id="triceps">
                    <option value="">--</option>
                    <?php
                        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                            echo gerarSections($user_data_array_exercicios, 'Tríceps');
                        }
                    ?>
                </select><br>
                <label for="serieTriceps">Série: </label>
                <select name="serieTriceps" id="serieTriceps">
                    <option value="">--</option>
                    <option value="3 x 10">3 x 10</option>
                    <option value="3 x 12">3 x 12</option>
                    <option value="4 x 10">4 x 10</option>
                    <option value="4 x 12">4 x 12</option>
                    <option value="Desejado">Desejado</option>
                </select>
                <table id="table_exericios">
                    <caption>
                    </caption>
                    <thead>
                    <tr>
                        <th scope="col">Ordem</th>
                        <th scope="col">Exercicío</th>
                        <th scope="col">Série</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody id="corpoTabelaTriceps">
                    <tr>
                        <th scope="row" colspan="4">Tríceps</th>
                    </tr>
                    <?php
                        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                            echo gerarTabela($user_data_array, "Tríceps");
                        }
                    ?>
                    </tbody>
                </table>
                <button id="btnSalvarExercicioTriceps" type="submit">Adicionar Exercicío</button><br>
            </form>
        </div>

        <div class="form_abdomen">
            <button onclick="diaVoltar()">Voltar</button>
            <h1>Abdominal</h1>
            <form action="forms/adicionarTreino.php?membro=Abdominal&select=abdomen&serie=serieAbdomen&situacao=conectado&id=<?php echo $_GET['id']; ?>" method="POST" id="adicionarTreinoAbdominal">
                <p class="mensagem_abdomen">Porfavor, selecione o exercício e a série.</p>
                <label for="abdomen">Exercício: </label>
                <select name="abdomen" id="abdomen">
                    <option value="">--</option>
                    <?php
                        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                            echo gerarSections($user_data_array_exercicios, 'Abdominal');
                        }
                    ?>
                </select><br>
                <label for="serieAbdomen">Série: </label>
                <select name="serieAbdomen" id="serieAbdomen">
                    <option value="">--</option>
                    <option value="3 x 30s - 40s">3 x 30s - 40s</option>
                    <option value="3 x +60s">3 x +60s</option>
                    <option value="4 x 30s - 40s">4 x 30s - 40s</option>
                    <option value="4 x +60s">4 x +60s</option>
                    <option value="Desejado">Desejado</option>
                </select>
                <table id="table_exericios">
                    <caption>
                    </caption>
                    <thead>
                    <tr>
                        <th scope="col">Ordem</th>
                        <th scope="col">Exercicío</th>
                        <th scope="col">Série</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody id="corpoTabelaAbdomen">
                    <tr>
                        <th scope="row" colspan="4">Amdominal</th>
                    </tr>
                    <?php
                        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                            echo gerarTabela($user_data_array, "Abdominal");
                        }
                    ?>
                    </tbody>
                </table>
                <button id="btnSalvarExercicioAbdomen" type="submit">Adicionar Exercicío</button><br>
            </form>
        </div>

        <div class="form_costa">
            <button onclick="diaVoltar()">Voltar</button>
            <h1>Costa</h1>
            <form action="forms/adicionarTreino.php?membro=Costa&select=costa&serie=serieCosta&situacao=conectado&id=<?php echo $_GET['id']; ?>" method="POST" id="adicionarTreinoCosta">
                <p class="mensagem_costa">Porfavor, selecione o exercício e a série.</p>
                <label for="costa">Exercício: </label>
                <select name="costa" id="costa">
                    <option value="">--</option>
                    <?php
                        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                            echo gerarSections($user_data_array_exercicios, 'Costa');
                        }
                    ?>
                </select><br>
                <label for="seroeCosta">Série</label>
                <select name="serieCosta" id="serieCosta">
                    <option value="">--</option>
                    <option value="3 x 10">3 x 10</option>
                    <option value="3 x 12">3 x 12</option>
                    <option value="4 x 10">4 x 10</option>
                    <option value="4 x 12">4 x 12</option>
                    <option value="Desejado">Desejado</option>
                </select>
                <table id="table_exericios">
                    <caption>
                    </caption>
                    <thead>
                    <tr>
                        <th scope="col">Ordem</th>
                        <th scope="col">Exercicío</th>
                        <th scope="col">Série</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody id="corpoTabelaCosta">
                    <tr>
                        <th scope="row" colspan="4">Costa</th>
                    </tr>
                    <?php
                        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                            echo gerarTabela($user_data_array, "Costa");
                        }
                    ?>
                    </tbody>
                </table>
                <button id="btnSalvarExercicioAbdomen" type="submit">Adicionar Exercicío</button><br>
            </form>
        </div>

        <div class="form_biceps">
            <button onclick="diaVoltar()">Voltar</button>
            <h1>Bíceps</h1>
            <form action="forms/adicionarTreino.php?membro=Bíceps&select=biceps&serie=serieBiceps&situacao=conectado&id=<?php echo $_GET['id']; ?>" method="POST" id="adicionarTreinoBiceps">
                <p class="mensagem_biceps">Porfavor, selecione o exercício e a série.</p>
                <label for="biceps">Exercício: </label>
                <select name="biceps" id="biceps">
                    <option value="">--</option>
                    <?php
                        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                            echo gerarSections($user_data_array_exercicios, 'Bíceps');
                        }
                    ?>
                </select><br>
                <label for="serieBiceps">Série: </label>
                <select name="serieBiceps" id="serieBiceps">
                    <option value="">--</option>
                    <option value="3 x 10">3 x 10</option>
                    <option value="3 x 12">3 x 12</option>
                    <option value="4 x 10">4 x 10</option>
                    <option value="4 x 12">4 x 12</option>
                    <option value="Desejado">Desejado</option>
                </select>
                <table id="table_exericios">
                    <caption>
                    </caption>
                    <thead>
                    <tr>
                        <th scope="col">Ordem</th>
                        <th scope="col">Exercicío</th>
                        <th scope="col">Série</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody id="corpoTabelaBiceps">
                    <tr>
                        <th scope="row" colspan="4">Bíceps</th>
                    </tr>
                    <?php
                        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                            echo gerarTabela($user_data_array, "Bíceps");
                        }
                    ?>
                    </tbody>
                </table>
                <button id="btnSalvarExercicioBiceps" type="submit">Adicionar Exercicío</button><br>
            </form>
        </div>

        <div class="form_ombro">
            <button onclick="diaVoltar()">Voltar</button>
            <h1>Ombro</h1>
            <form action="forms/adicionarTreino.php?membro=Ombro&select=ombro&serie=serieOmbro&situacao=conectado&id=<?php echo $_GET['id']; ?>" method="POST" id="adicionarTreinoOmbro">
                <p class="mensagem_ombro">Porfavor, selecione o exercício e a série.</p>
                <label for="ombro">Exercício: </label>
                <select name="ombro" id="ombro">
                    <option value="">--</option>
                    <?php
                        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                            echo gerarSections($user_data_array_exercicios, 'Ombro');
                        }
                    ?>
                </select><br>
                <label for="serieOmbro">Série: </label>
                <select name="serieOmbro" id="serieOmbro">
                    <option value="">--</option>
                    <option value="3 x 10">3 x 10</option>
                    <option value="3 x 12">3 x 12</option>
                    <option value="4 x 10">4 x 10</option>
                    <option value="4 x 12">4 x 12</option>
                    <option value="Desejado">Desejado</option>
                </select>
                <table id="table_exericios">
                    <caption>
                    </caption>
                    <thead>
                    <tr>
                        <th scope="col">Ordem</th>
                        <th scope="col">Exercicío</th>
                        <th scope="col">Série</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody id="corpoTabelaOmbro">
                    <tr>
                        <th scope="row" colspan="4">Ombro</th>
                    </tr>
                    <?php
                        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                            echo gerarTabela($user_data_array, "Ombro");
                        }
                    ?>
                    </tbody>
                </table>
                <button id="btnSalvarExercicioOmbro" type="submit">Adicionar Exercicío</button><br>
            </form>
        </div>

        <div class="form_mem_inferiores">
        <button onclick="diaVoltar()">Voltar</button>
            <h1>Membros Inferiores</h1>
            <form action="forms/adicionarTreino.php?membro=Membros Inferiores&select=membrosInferiores&serie=serieMembrosInferiores&situacao=conectado&id=<?php echo $_GET['id']; ?>" method="POST" id="adicionarTreinoMembrosInferiores">
                <p class="mensagem_mem_inferiores">Porfavor, selecione o exercício e a série.</p>
                <label for="membrosInferiores">Exercício: </label>
                <select name="membrosInferiores" id="membrosInferiores">
                    <option value="">--</option>
                    <?php
                        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                            echo gerarSections($user_data_array_exercicios, 'Membros Inferiores');
                        }
                    ?>
                </select><br>
                <label for="serieMembrosInferiores">Série: </label>
                <select name="serieMembrosInferiores" id="serieMembrosInferiores">
                    <option value="">--</option>
                    <option value="3 x 10">3 x 10</option>
                    <option value="3 x 12">3 x 12</option>
                    <option value="4 x 10">4 x 10</option>
                    <option value="4 x 12">4 x 12</option>
                    <option value="Desejado">Desejado</option>
                </select>
                <table id="table_exericios">
                    <caption>
                    </caption>
                    <thead>
                    <tr>
                        <th scope="col">Ordem</th>
                        <th scope="col">Exercicío</th>
                        <th scope="col">Série</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody id="corpoTabelaMembrosInferiores">
                    <tr>
                        <th scope="row" colspan="4">Membros Inferiores</th>
                    </tr>
                    <?php
                        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                            echo gerarTabela($user_data_array, "Membros Inferiores");
                        }
                    ?>
                    </tbody>
                </table>
                <button id="btnSalvarExercicioMembrosInferiores" type="submit">Adicionar Exercicío</button><br>
            </form>
        </div>


    </section>

    <br><br><br><br><br><br><br><br><br><br><br>

    <script src="./assets/js/script1.js"></script>
</body>
</html>