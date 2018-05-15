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

    //Verifica se o usuario já é registrado
    $email = $_POST['email'];
    $senha = $_POST['password'];

    $query = mysqli_query($conexao, "SELECT * FROM users WHERE email = '$email' AND senha = '$senha'") or die();

    if(mysqli_num_rows($query) > 0){
        header('location: ' . dirname( $_SERVER['PHP_SELF'] ) . '/panel.php');
    }else {
        echo "Oops, você ainda não é registrado<br>";
        echo "<a class='toRegister' href='./register.php'>click here to Register</a>"; 
        die();
    }
?>