<?php

$servername = "127.0.0.1";
$username = "aplicacao";
$password = "aplicacaoweb";
$dbname = "usuario_db";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}


$nome_usuario = $_POST['nome_usuario'];
$senha = $_POST['senha'];


$sql = "SELECT * FROM usuarios WHERE nome_usuario='$nome_usuario' AND senha='$senha'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $usuario = $result->fetch_assoc();
    if ($usuario['tipo'] == 'usuario1') {
        header("Location: usuario1.html");
        exit();
    } elseif ($usuario['tipo'] == 'usuario2') {
        header("Location: usuario2.html");
        exit();
    } elseif ($nome_usuario == 'admin') {
        header("Location: admin.php");
        exit();
    } else {

        header("Location: index.html");
        exit();
    }
} else {

    echo "<script>alert('Nome de usuário ou senha incorretos.');</script>";

    echo "<script>window.location.href = 'index.html';</script>";
}


$conn->close();
?>
