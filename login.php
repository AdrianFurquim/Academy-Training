<?php
    include("forms/conexao.php");

    // Comando momentâneo para pegar o usuário de testes.
    $comando_usuário = "SELECT * FROM `usuario` WHERE usuario.usu_id = 1";
    $result=$conexao->query($comando_usuário);

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
    <link rel="stylesheet" href="./assets/css/style6.css">
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

    <section class="conteiner_login">
        <div class="imagem_login">
            <img src="./assets/img/person-circle.svg" class="foto_login" alt="Foto de perfil">
        </div>
        <div class="dados_login">
            <?php
                foreach($result as $user_data) {
                    if($user_data['usu_id'] == 1){
                        echo "<h2>".$user_data['usu_nome']."</h2>";
                        echo "<p>Altura:".$user_data['usu_altura']."m</p>";
                        echo "<p>Peso: ".$user_data['usu_peso']."kg</p>";
                        echo "<p>dias treinados: ".$user_data['usu_dias_treinados']." dias</p>";
                        echo "<p>Tempo de treinamento: ".$user_data['usu_temp_treinamento']."</p>";
                        echo "<p>Meta: ".$user_data['usu_meta']."</p>";
                    }
                }
            ?>
        </div>
        
    </section>

    <script src="./assets/js/script1.js"></script>
</body>
</html>