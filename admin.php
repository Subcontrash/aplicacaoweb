<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do Ponto</title>
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link rel="stylesheet" href="styles2.css">
    <link rel="stylesheet" href="styles3.css">
</head>
<body>

<div id="container">
    <p align="center"><img src="logo.png" width="110" height="111"></p>
    <h2>Dados do Ponto</h2>

    <button id="exportButton" onclick="exportToCSV()">Exportar para CSV</button>

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
            die("Falha na conexão com o banco de dados: " . $conn->connect_error);
        }

        $sql = "SELECT id_usuario, tipo_ponto, data_registro FROM ponto";

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
            echo "<tr><td colspan='3'>Nenhum ponto registrado.</td></tr>";
        }

        $conn->close();
        ?>
        </tbody>
    </table>
</div>

<script>
    function exportToCSV() {
        var table = document.getElementById("pontoTable");
        var csv = [];
        for (var i = 0; i < table.rows.length; i++) {
            var row = [];
            for (var j = 0; j < table.rows[i].cells.length; j++) {
                row.push(table.rows[i].cells[j].innerText);
            }
            csv.push(row.join(","));
        }
        var csvContent = "data:text/csv;charset=utf-8," + csv.join("\n");
        var encodedUri = encodeURI(csvContent);
        var link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "dados_ponto.csv");
        document.body.appendChild(link);
        link.click();
    }
</script>

</body>
</html>
