<?php
    include("forms/conexao.php");

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $usuario_id = $_GET['id'];

        // Pegando valores do banco dedos.
        $select_dia_membros = "SELECT 
            DISTINCT t.dia_nome AS Dia,
            t.membro_nome AS Membro, 
            t.tre_id AS TreinoId, 
            te.tre_exe_id AS TreExeId
        FROM 
            usuario u
        JOIN 
            treino_exercicios te ON u.usu_id = te.usuario_id
        JOIN 
            treinos t ON te.treino_id = t.tre_id
        WHERE 
            u.usu_id = $usuario_id;";

        $result=$conexao->query($select_dia_membros);

        $result_data_array = [];
        while($user_data = mysqli_fetch_assoc($result)){
            $result_data_array[] = $user_data;
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
    <link rel="stylesheet" href="./assets/css/style12.css">

    <style>
        <?php
            // Verificando a situação do formulário enviado.
            if (isset($_GET['situacaoMen'])) {
                $situacaoMen = $_GET['situacaoMen'];

                // Caso o usuário tenha esquecido de algum select.
                if ($situacaoMen == "dadosFaltando") {
                    echo ".organiza_falta_dados { display: block; }";
                    echo ".organiza_ja_existente { display: none }";

                // Caso o usuário já tenha aquele treino.
                }else if($situacaoMen == "orgExistente"){
                    echo ".organiza_falta_dados { display: none; }";
                    echo ".organiza_ja_existente { display: block; }";

                }
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

    <section class="organizando_dias_treinos">
        <div class="conteiner_total_opcoes">
            <?php
                gerarLink('criarTreino');
            ?>
                <button class="btnVoltar">Voltar</button>
            </a>
            <div class="conteiner_selects">
                <form action="forms/adicionarDiaMembro.php?situacao=conectado&id=<?php echo $_GET['id']; ?>" method="POST">
                    <p class="organiza_falta_dados" >Por favor, selecione o dia com seu respectivo membro</p>
                    <p class="organiza_ja_existente" >Este treinamento de membro do dia já foi selecionado</p>
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
                    </select> <br><br>
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
                    </select> <br><br>
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
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody id="corpoTabelaPeito">
                    <?php
                        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                            foreach($result_data_array as $user_data){
                                echo "<tr>";
                                    echo "<td>".$user_data['Dia']."</td>";
                                    echo "<td>".$user_data['Membro']."</td>";
                                    echo "<td>
                                    <a href='forms/removerDiaMembro.php?situacao=conectado&id=". $_GET['id']."&TreinoId=". $user_data['TreinoId'] ."
                                    &TreExeId=" . $user_data['TreExeId'] . "&membro=" . $user_data['Membro'] ."'
                                     class='remove_exercicio'>Excluir</a></td>";
                                echo "</tr>";
                            }
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