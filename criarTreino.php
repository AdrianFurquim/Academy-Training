<?php
    include("forms/conexao.php");

    // Comando SQL para resgatar dados do treino de Peito ================================================================================
    $comandoTreino = "SELECT exercicio.exe_ordem, exercicio.exe_nome, exercicio.exe_serie, membro_treino.mem_nome
    FROM usuario 
        JOIN 
            usuario_treino ON usuario.usu_id = usuario_treino.usu_id 
        JOIN 
            membro_treino ON usuario_treino.treino_dia = membro_treino.treino_dia 
        JOIN 
            membro_exercicio ON membro_treino.mem_nome = membro_exercicio.mem_nome 
        JOIN 
            exercicio ON membro_exercicio.exe_nome = exercicio.exe_nome";

    // Salvando resultados das consultas =========================================================================================================
    $treino=$conexao->query($comandoTreino);

    // Incerindo Geral em um array para poder gerar varios elementos nas tabelas =================================================================
    $user_data_array = [];
    while($user_data = mysqli_fetch_assoc($treino)){
        $user_data_array[] = $user_data;
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
    <link rel="stylesheet" href="./assets/css/style2.css">
</head>
<body>

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

    <section class="montando_treino">
        <div class="escolha_dia">
            <h1>Criando Treino:</h1>
            <button onclick="diaEscolhido()">Segunda-Feira</button>
            <button onclick="diaEscolhido()">Terça-Feira</button>
            <button onclick="diaEscolhido()">Quarta-Feira</button>
            <button onclick="diaEscolhido()">Quinta-Feira</button>
            <button onclick="diaEscolhido()">Sexta-Feira</button>
            <button onclick="diaEscolhido()">Sábado</button>
        </div>
    
        <div class="escolha_membro">
            <h1>Escolha o membro desejado:</h1>
            <button onclick="membroEscolhido('peito')">Peito</button>
            <button onclick="membroEscolhido('triceps')">Tríceps</button>
            <button onclick="membroEscolhido('abdomen')">Abdomen</button>
            <button onclick="membroEscolhido('costas')">Costa</button>
            <button onclick="membroEscolhido('biceps')">Bíceps</button>
            <button onclick="membroEscolhido('ombro')">Ombro</button>
            <button onclick="membroEscolhido('mem_inferiores')">Membros inferiores</button>
        </div>

        <div class="form_peito">
            <button onclick="diaVoltar()">Voltar</button>
            <h1>Peito</h1>
            <form action="forms/adicionarTreinoPeito.php" method="POST" id="adicionarTreinoPeito">
                <select name="peito" id="peito">
                    <option value="">--</option>
                    <option value="Supino Reto Barra">Supino Reto Barra</option>
                    <option value="Supino Reto Halter">Supino Reto Halter</option>
                    <option value="Supino Reto Pórtico">Supino Reto Pórtico</option>

                    <option value="Supino Inclinado Barra">Supino Inclinado Barra</option>
                    <option value="Supino Inclinado Halter">Supino Inclinado Halter</option>
                    <option value="Supino Inclinado Pórtico">Supino Inclinado Pórtico</option>

                    <option value="Supino Declinado Barra">Supino Declinado Barra</option>
                    <option value="Supino Declinado Halter">Supino Declinado Halter</option>
                    <option value="Supino Declinado Pórtico">Supino Declinado Pórtico</option>

                    <option value="Supino Articulado">Supino Articulado</option>

                    <option value="Crucifixo Halter">Crucifixo Halter</option>
                    <option value="Crucifixo Aparelho">Crucifixo Aparelho</option>

                    <option value="Pullover">Pullover</option>

                    <option value="Cross Over">Cross Over</option>

                    <option value="Peck Deck">Peck Deck</option>
                    <option value="Dropset">Dropset</option>
                </select>
                <select name="seriePeito" id="seriePeito">
                    <option value="--">--</option>
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
                    </tr>
                    </thead>
                    <tbody id="corpoTabelaPeito">
                    <tr>
                        <th scope="row" colspan="3">Peitoral</th>
                    </tr>
                    <?php
                        foreach($user_data_array as $user_data){
                            echo "<tr>";
                            if($user_data['mem_nome'] == "Peito"){
                                echo "<td>".$user_data['exe_ordem']."</td>";
                                echo "<td>".$user_data['exe_nome']."</td>";
                                echo "<td>".$user_data['exe_serie']."</td>";
                                echo "<td>
                                <a href='forms/removerExercicio.php?exercicio=$user_data[exe_nome]'>Excluir</a>  
                                </td>";
                            }
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
            <form action="forms/adicionarTreinoTriceps.php" method="POST" id="adicionarTreinoTriceps">
                <select name="triceps" id="triceps">
                    <option value="">--</option>

                    <option value="Tríceps Frânces Halter">Tríceps Frânces Halter</option> 
                    <option value="Tríceps Frânces Unilateral">Tríceps Frânces Unilateral</option>
                    <option value="Tríceps Frânces Cross">Tríceps Frânces Cross</option>

                    <option value="Tríceps Coice Halter">Tríceps Coice Halter</option>
                    <option value="Tríceps Coice Cross">Tríceps Coice Cross</option>

                    <option value="Tríceps Corda">Tríceps Corda</option>
                    <option value="Dropset">Dropset</option>

                    <option value="Tríceps Mergulho Banco">Tríceps Mergulho Banco</option>
                    <option value="Tríceps Mergulho Paralelas">Tríceps Mergulho Paralelas</option>

                    <option value="Tríceps Roldana">Tríceps Roldana</option>
                    <option value="Pegada Invertida">Pegada Invertida</option>
                    <option value="Dropset">Dropset</option>
                    <option value="Unilateral">Unilateral</option>

                    <option value="Tríceps Barra">Tríceps Barra</option>
                    <option value="Tríceps Pórtico">Tríceps Pórtico</option>

                    <option value="Tríceps Testa Barra">Tríceps Testa Barra</option>
                    <option value="Tríceps Testa Halter">Tríceps Testa Halter</option>
                    <option value="Tríceps Testa Cross">Tríceps Testa Cross</option>
                    <option value="Tríceps Testa Dropset">Tríceps Testa Dropset</option>
                </select>
                <select name="serieTriceps" id="serieTriceps">
                    <option value="--">--</option>
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
                    </tr>
                    </thead>
                    <tbody id="corpoTabelaTriceps">
                    <tr>
                        <th scope="row" colspan="3">Tríceps</th>
                    </tr>
                    <?php
                        foreach($user_data_array as $user_data){
                            echo "<tr>";
                            if($user_data['mem_nome'] == "Tríceps"){
                                echo "<td>".$user_data['exe_ordem']."</td>";
                                echo "<td>".$user_data['exe_nome']."</td>";
                                echo "<td>".$user_data['exe_serie']."</td>";
                                echo "<td>Excluir</td>";
                            }
                            echo "</tr>";
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
            <form action="">
                <select name="abdomen" id="abdomen">
                    <option value="">--</option>

                    <option value="Supra Colchonete">Supra Colchonete</option>
                    <option value="Supra Com Anilha">Supra Com Anilha</option>
                    <option value="Supra Com Barra">Supra Com Barra</option>
                    <option value="Supra Pórtico">Supra Pórtico</option>

                    <option value="Remador">Remador</option>
                    <option value="Remador Com Anilha e tornozeleira">Remador Com Anilha e tornozeleira</option>
                    <option value="Remador Canivete">Remador Canivete</option>
                    <option value="Remador Prancha">Remador Prancha</option>

                    <option value="Inclinação Lateral Cross">Inclinação Lateral </option>
                    <option value="Inclinação Lateral Anilha">Inclinação Lateral Anilha</option>
                    <option value="Inclinação Lateral Colchonete">Inclinação Lateral Colchonete</option>
                    <option value="Inclinação Lateral Aparelho Lombar">Inclinação Lateral Aparelho Lombar</option>

                    <option value="Infra no Colchonete">Infra no Colchonete</option>
                    <option value="Infra Paralelas">Infra Paralelas</option>
                    <option value="Infra Boxeador">Infra Boxeador</option>
                </select>
                <select name="serieAbdomen" id="serieAbdomen">
                    <option value="--">--</option>
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
                    </tr>
                    </thead>
                    <tbody id="corpoTabelaAbdomen">
                    <tr>
                        <th scope="row" colspan="3">Amdominal</th>
                    </tr>
                   
                    </tbody>
                </table>
            </form>
            <button id="btnSalvarExercicioAbdomen">Adicionar Exercicío</button><br>
        </div>

        <div class="form_costa">
            <button onclick="diaVoltar()">Voltar</button>
            <h1>Costa</h1>

        </div>

        <div class="form_biceps">
            <button onclick="diaVoltar()">Voltar</button>
            <h1>Bíceps</h1>

        </div>

        <div class="form_ombro">
            <button onclick="diaVoltar()">Voltar</button>
            <h1>Ombro</h1>

        </div>

        <div class="form_mem_inferiores">
            <button onclick="diaVoltar()">Voltar</button>
            <h1>Mebros Inferiores</h1>

        </div>

    </section>

    <br><br><br><br><br><br><br><br><br><br><br>

    <script src="./assets/js/script.js"></script>
</body>
</html>