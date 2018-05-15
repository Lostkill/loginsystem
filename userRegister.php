<?php
    //Informações para conexão ao Banco de Dados
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "loginsystem";

    //Conecta ao banco de dados
    $conexao = new mysqli($host, $user, $password, $db);

    //Exibe error caso ocorra algum
    if($conexao->connect_error){
        die("Conexão falhou");
    }

    //Register User in the databse
    $email = $_POST['email'];
    $senha = $_POST['password'];

    $query = "INSERT INTO users(email, senha) VALUES('$email', '$senha')";

    if($conexao->query($query) === TRUE){
        echo "<script>alert('Registro efetuado com sucesso!');</script>";
        header('location: ' . dirname( $_SERVER['PHP_SELF'] ) . '/index.php');
    }else {
        echo "<script type='javascript'>alert('Ocorreu algum erro!');</script>";
    }

?>