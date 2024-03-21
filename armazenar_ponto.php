<?php

$servername = "127.0.0.1";
$username = "aplicacao";
$password = "aplicacaoweb";
$dbname = "usuario_db";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo_ponto = $_POST['tipo_ponto'];
    $hora_ponto = $_POST['hora_ponto'];
    $id_usuario = $_POST['id_usuario'];

    $sql = "INSERT INTO ponto (id_usuario, tipo_ponto, hora_ponto) VALUES ('$id_usuario', '$tipo_ponto', '$hora_ponto')";
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Ponto registrado com sucesso!"); window.location.href = "index.html";</script>';
    } else {
        echo '<script>alert("Erro ao registrar o ponto: ' . $conn->error . '");</script>';
    }
}


$conn->close();
?>
