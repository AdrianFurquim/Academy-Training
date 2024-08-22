<?php
    include("forms/conexao.php");

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $usuario_id = $_GET['id'];
        
        // Comando momentâneo para pegar o usuário de testes.
        $comando_usuário = "SELECT * FROM `usuario` WHERE usuario.usu_id = $_GET[id]";
        $result=$conexao->query($comando_usuário);

    }
    
    function gerarDadosLogin($result){
        echo "<div class='imagem_login'>";
            echo "<img src='./assets/img/person-circle.svg' class='foto_login' alt='Foto de perfil'>";
        echo "</div>";
        echo "<div class='dados_login'>";
            foreach($result as $user_data) {
                if($user_data['usu_id'] == $_GET['id']){

                    echo "<form action='forms/salvarDados.php?situacao=conectado&id=". $_GET['id']."' method='POST' class='forms_cad_edit_dados'>";

                        echo "<label for='nome'>Nome:</label>";
                        echo "<input type='text' value=".$user_data['usu_nome']." name='nome' id='nome'>";

                        echo "<label for='altura'>Altura:</label>";
                        echo "<input type='text' value=".$user_data['usu_altura']." name='altura' id='altura'>";

                        echo "<label for='peso'>Peso:</label>";
                        echo "<input type='text' value=".$user_data['usu_peso']." name='peso' id='peso'>";

                        echo "<label for='meta'>Meta:</label>";
                        echo "<input type='text' value=".$user_data['usu_meta']." name='meta' id='meta'>";

                        echo "<button class='btnEditar' type='submit'>Editar</button>";

                    echo "</form>";
                }
            }
        echo "</div>";
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
    <title>Usuario - Academy Training</title>
    <link rel="stylesheet" href="./assets/css/style14.css">

    <style>
        <?php
            if (isset($_GET['situacao'])) {
                $situacao = $_GET['situacao'];
                if ($situacao == "conectado") {
                    echo ".conteiner_realiza_login { display: none; }";
                    echo ".conteiner_login { display: block; }";
                }else{
                    echo ".conteiner_realiza_login { display: block; }";
                    echo ".conteiner_login { display: none; }";
                }
            }
            
            // Verificando a situação do formulário enviado.
            if (isset($_GET['situacaoMen'])) {
                $situacaoMen = $_GET['situacaoMen'];

                // Caso o usuário tenha esquecido de algum select.
                if ($situacaoMen == "dadosFalt") {
                    echo ".login_dadosFalt { display: block; }";
                    echo ".login_incorreto { display: none }";

                // Caso o usuário já tenha aquele treino.
                }else if($situacaoMen == "incorreto"){
                    echo ".login_dadosFalt { display: none; }";
                    echo ".login_incorreto { display: block; }";

                }else{
                    echo ".login_dadosFalt { display: none; }";
                    echo ".login_incorreto { display: none; }";
                }
            }
        ?>
        p, a{
            color: white;
        }
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

    <section class="conteiner_realiza_login">
        <h1>Acadey Training</h1>
        <p class="login_dadosFalt">Por favor, preencha todos os campos</p>
        <p class="login_incorreto">Senha ou Email incorreto, tente novamente</p>
        <form action="forms/confirmaLogin.php" method="POST" class="forms_cad_login">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">

            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha">
            <p>Realizar <a href="criarCadastro.php">Cadastro</a></p>
            <button type="submit">Entrar</button>
        </form>

    </section>

    <section class="conteiner_login">
        <?php
            gerarDadosLogin($result);
        ?>
        
    </section>

    <script src="./assets/js/script1.js"></script>
</body>
</html>