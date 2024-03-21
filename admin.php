<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do Ponto</title>
    <link rel="stylesheet" href="styles2.css">
</head>
<body>

<div id="container">
    <h2>Dados do Ponto</h2>

    <table id="pontoTable">
        <thead>
            <tr>
                <th>ID do Usuário</th>
                <th>Tipo de Ponto</th>
                <th>Data de Registro</th>
            </tr>
        </thead>
        <tbody>
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
                echo "<td>" . $row["data_registro"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhum ponto registrado.</td></tr>";
        }

        
        $conn->close();
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
