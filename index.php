<?php
    include("forms/conexao.php");

    // Comando SQL para resgatar dados do treino de Terça-Feira ================================================================================
    $treinoTerca = "SELECT exercicio.exe_ordem, exercicio.exe_nome, exercicio.exe_serie, membro_treino.mem_nome
    FROM usuario 
        JOIN 
            usuario_treino ON usuario.usu_id = usuario_treino.usu_id 
        JOIN 
            membro_treino ON usuario_treino.treino_dia = membro_treino.treino_dia 
        JOIN 
            membro_exercicio ON membro_treino.mem_nome = membro_exercicio.mem_nome 
        JOIN 
            exercicio ON membro_exercicio.exe_nome = exercicio.exe_nome 
    WHERE usuario.usu_id = 1 AND usuario_treino.treino_dia = 2";

    // Comando SQL para resgatar dados do treino de Quarta-Feira ================================================================================
    $treinoQuarta = "SELECT exercicio.exe_ordem, exercicio.exe_nome, exercicio.exe_serie, membro_treino.mem_nome
    FROM usuario 
        JOIN 
            usuario_treino ON usuario.usu_id = usuario_treino.usu_id 
        JOIN 
            membro_treino ON usuario_treino.treino_dia = membro_treino.treino_dia 
        JOIN 
            membro_exercicio ON membro_treino.mem_nome = membro_exercicio.mem_nome 
        JOIN 
            exercicio ON membro_exercicio.exe_nome = exercicio.exe_nome 
    WHERE usuario.usu_id = 1 AND usuario_treino.treino_dia = 3";

    // Comando SQL para resgatar dados do treino de Quinta-Feira ================================================================================
    $treinoQuinta = "SELECT exercicio.exe_ordem, exercicio.exe_nome, exercicio.exe_serie, membro_treino.mem_nome
    FROM usuario 
        JOIN 
            usuario_treino ON usuario.usu_id = usuario_treino.usu_id 
        JOIN 
            membro_treino ON usuario_treino.treino_dia = membro_treino.treino_dia 
        JOIN 
            membro_exercicio ON membro_treino.mem_nome = membro_exercicio.mem_nome 
        JOIN 
            exercicio ON membro_exercicio.exe_nome = exercicio.exe_nome 
    WHERE usuario.usu_id = 1 AND usuario_treino.treino_dia = 4";

    // Salvando resultados das consultas =========================================================================================================
    $resultUM=$conexao->query($treinoTerca);
    $resultDOIS=$conexao->query($treinoQuarta);
    $resultTRES=$conexao->query($treinoQuinta);

    // Incerindo Geral em um array para poder gerar varios elementos nas tabelas =================================================================
    $user_data_array = [];
    while($user_data = mysqli_fetch_assoc($resultUM)){
        $user_data_array[] = $user_data;
    }

    $user_data_array_quarta = [];
    while($user_data = mysqli_fetch_assoc($resultDOIS)){
        $user_data_array_quarta[] = $user_data;
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
    <link rel="stylesheet" href="./assets/css/style.css">
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
            <a href="adicionarTreino.html">
                <div class="criar_treino">+</div>
            </a>
            <a href="index.php" class="meus_treinos_link">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                </svg>
            </a>
            <a href="login.html" class="login_link">
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
            <tr>
                <th scope="row" colspan="3">Sem treino</th>
            </tr>
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
            echo "<tr>";
                echo "<th scope='row' colspan='3'>Peitoral</th>";
            echo "</tr>";
                foreach($user_data_array as $user_data){
                    echo "<tr>";
                    if($user_data['mem_nome'] == "Peito"){
                        echo "<td>".$user_data['exe_ordem']."</td>";
                        echo "<td>".$user_data['exe_nome']."</td>";
                        echo "<td>".$user_data['exe_serie']."</td>";
                    }
                    echo "</tr>";
                 }
            echo "<tr>";
                echo "<th scope='row' colspan='3'>Tríceps</th>";
            echo "</tr>";

                foreach($user_data_array as $user_data){
                    echo "<tr>";
                    if($user_data['mem_nome'] == "Tríceps"){
                        echo "<td>".$user_data['exe_ordem']."</td>";
                        echo "<td>".$user_data['exe_nome']."</td>";
                        echo "<td>".$user_data['exe_serie']."</td>";
                    }
                    echo "</tr>";
                 }
            echo "<tr>";
                echo "<th scope='row' colspan='3'>Abdômen</th>";
            echo "</tr>";
                foreach($user_data_array as $user_data){
                    echo "<tr>";
                    if($user_data['mem_nome'] == "Abdominal"){
                        echo "<td>".$user_data['exe_ordem']."</td>";
                        echo "<td>".$user_data['exe_nome']."</td>";
                        echo "<td>".$user_data['exe_serie']."</td>";
                    }
                    echo "</tr>";
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
            echo "<tr>";
                echo "<th scope='row' colspan='3'>Costas</th>";
            echo "</tr>";
                foreach($user_data_array_quarta as $user_data){
                    echo "<tr>";
                    if($user_data['mem_nome'] == "Costa"){
                        echo "<td>".$user_data['exe_ordem']."</td>";
                        echo "<td>".$user_data['exe_nome']."</td>";
                        echo "<td>".$user_data['exe_serie']."</td>";
                    }
                    echo "</tr>";
                 }
            echo "<tr>";
                echo "<th scope='row' colspan='3'>Bíceps</th>";
            echo "</tr>";

                foreach($user_data_array_quarta as $user_data){
                    echo "<tr>";
                    if($user_data['mem_nome'] == "Bíceps"){
                        echo "<td>".$user_data['exe_ordem']."</td>";
                        echo "<td>".$user_data['exe_nome']."</td>";
                        echo "<td>".$user_data['exe_serie']."</td>";
                    }
                    echo "</tr>";
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
            <tr>
                <th scope="row" colspan="3">Ombro</th>
            </tr>
            <tr onclick="confereTreino(26)">
                <td>1</td>
                <td>Desenvolvimento no Aparelho</td>
                <td>3 x 10</td>
            </tr>
            <tr onclick="confereTreino(27)">
                <td>2</td>
                <td>Elevação Lateral Halter</td>
                <td>3 x 10</td>
            </tr>
            <tr onclick="confereTreino(28)">
                <td>3</td>
                <td>Elevação Frontal Halter</td>
                <td>3 x 10</td>
            </tr>
            <tr>
                <th scope="row" colspan="3">Membros Inferiores</th>
            </tr>
            <tr onclick="confereTreino(30)">
                <td>1</td>
                <td>Cadeira Extensora</td>
                <td>3 x 10</td>
            </tr>
            <tr onclick="confereTreino(31)">
                <td>2</td>
                <td>Cadeira Extensora Unilateral</td>
                <td>3 x 10</td>
            </tr>
            <tr onclick="confereTreino(32)">
                <td>3</td>
                <td>Cadeira Adutora</td>
                <td>3 x 10</td>
            </tr>
            <tr onclick="confereTreino(33)">
                <td>4</td>
                <td>Abdução Quadril Aparelho</td>
                <td>3 x 10</td>
            </tr>
            <tr onclick="confereTreino(34)">
                <td>3</td>
                <td>Panturrilhas Livre</td>
                <td>3 x 10</td>
            </tr>
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
            </tbody>
        </table>
    </section>

    <script src="./assets/js/script.js"></script>
</body>
</html>