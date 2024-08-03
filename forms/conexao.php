<?php
    $servidor="localhost";
    $usuario="root";
    $senha="";
    $bdname="academy_treining";

    $conexao=mysqli_connect($servidor, $usuario, $senha, $bdname);

    if(!$conexao){
        die("houve um erro: ".mysqli_connect_error());
    }
?>