<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento de Laboratório de Informática</title>
    <link rel="stylesheet" href="suareserva.css">
</head>
<body>
    <header>
        <h1>Agendamento de Laboratório de Informática</h1>
    </header>

    <nav>
        <ul>
            <li><a href="reserva.php">Agendar Laboratório</a></li>
        </ul>
    </nav>

    <div class="container">
        <section id="visualizar">
            <h2>Visualizar Agendamentos</h2>
            
        </section>
        <hr>




<?php
include_once('config.php'); // Certifique-se de que 'config.php' contém a criação da conexão

// Verifica se a conexão foi bem-sucedida
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Consulta SQL
$sql = "SELECT nome, data, horario, duracao FROM agendamentolaboratorio ORDER BY data ASC, horario ASC";


// Executa a consulta e verifica se foi bem-sucedida
$result = $conexao->query($sql);

if (!$result) {
    die("Erro na consulta: " . $conexao->error);
}

// Continua com o restante do código para exibir os resultados...


// Cria a tabela HTML
echo '<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Data</th>
            <th>Horário</th>
            <th>Duração (minutos)</th>
        </tr>
    </thead>
    <tbody>';

// Verifica se há resultados e os exibe
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["nome"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["data"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["horario"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["duracao"]) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>Nenhum agendamento encontrado</td></tr>";
}

// Fecha a tabela HTML
echo '</tbody></table>';

// Fecha a conexão com o banco de dados
$conexao->close();
?>

<section id="sobre">
         
        </section>
    </div>

    <footer>
        <p>&copy; 2024 Agendamento de Laboratório de Informática</p>
    </footer>
    </body>
    </html>
