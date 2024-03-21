<?php

$servername = "127.0.0.1";
$username = "aplicacao";
$password = "aplicacaoweb";
$dbname = "usuario_db";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}


$sql = "SELECT id_usuario, tipo_ponto, hora_ponto, data_registro FROM ponto";

$result = $conn->query($sql);


if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id_usuario"] . "</td>";
        echo "<td>" . $row["tipo_ponto"] . "</td>";
        echo "<td>" . $row["hora_ponto"] . "</td>";
        echo "<td>" . $row["data_registro"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "0 resultados encontrados.";
}


$conn->close();
?>
