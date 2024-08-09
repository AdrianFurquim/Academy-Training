<?php
    include("forms/conexao.php");

    $comando_dias_membros = "SELECT 
        DISTINCT ut.treino_dia, 
        DISTINCT mt.mem_nome
    FROM 
        usuario_treino ut
    JOIN 
        membro_treino mt ON ut.treino_dia = mt.treino_dia
    WHERE 
        ut.usu_id = 2";


    $select_dia_membros = "SELECT 
        DISTINCT t.dia_nome AS Dia,
        t.membro_nome AS Membro
    FROM 
        usuario u
    JOIN 
        treino_exercicios te ON u.usu_id = te.usuario_id
    JOIN 
        treinos t ON te.treino_id = t.tre_id
    WHERE 
        u.usu_id = 1;";

    $result=$conexao->query($select_dia_membros);

    $result_data_array = [];
    while($user_data = mysqli_fetch_assoc($result)){
        $result_data_array[] = $user_data;
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
    <title>Organizar Dias e Membros - Academy Training</title>
    <link rel="stylesheet" href="./assets/css/style8.css">

</head>
<body>

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

    <section class="organizando_dias_treinos">
        <div class="conteiner_total_opcoes">
            <div class="conteiner_selects">
                <form action="forms/adicionarDiaMembro.php" method="POST">
                    <label for="dia">Dia: </label>
                    <select name="dia" id="dia">
                        <option value="">--</option>
                        <option value="Segunda-Feira">Segunda-Feira</option>
                        <option value="Terça-Feira">Terça-Feira</option>
                        <option value="Quarta-Feira">Quarta-Feira</option>
                        <option value="Quinta-Feira">Quinta-Feira</option>
                        <option value="Sexta-Feira">Sexta-Feira</option>
                        <option value="Sábado">Sábado</option>
                        <option value="Domingo">Domingo</option>
                    </select>
                    <label for="membro_treino">Membro: </label>
                    <select name="membro_treino" id="membro_treino">
                        <option value="">--</option>
                        <option value="Peito">Peito</option>
                        <option value="Tríceps">Tríceps</option>
                        <option value="Abdominal">Abdominal</option>
                        <option value="Costa">Costa</option>
                        <option value="Bíceps">Bíceps</option>
                        <option value="Ombro">Ombro</option>
                        <option value="Membros Inferiores">Membros Inferiores</option>
                    </select>
                    <button class="btnSalvarConfigTreino" type="submit">Confirmar</button>
                </form>
            </div>
            <div class="conteiner_tabela_dias_treinos">
                <table id="table_exericios">
                    <caption>
                    </caption>
                    <thead>
                    <tr>
                        <th scope="col">Dia</th>
                        <th scope="col">Membro</th>
                    </tr>
                    </thead>
                    <tbody id="corpoTabelaPeito">
                    <?php
                        foreach($result_data_array as $user_data){
                            echo "<tr>";
                                echo "<td>".$user_data['Dia']."</td>";
                                echo "<td>".$user_data['Membro']."</td>";
                            echo "</tr>";
                        }
                    ?>
                    </tbody>
                </table>
                
            </div>
        </div>

    </section>

    <script src="./assets/js/script1.js"></script>
</body>
</html>