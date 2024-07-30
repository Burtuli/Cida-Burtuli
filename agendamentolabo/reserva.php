<?php

// Configuração do banco de dados
$host = "localhost"; // Endereço do servidor do banco de dados
$usuario = "root"; // Usuário do banco de dados
$senha = "escola"; // Senha do banco de dados
$banco = "reserva_de_lab"; // Nome do banco de dados

try {
    // Conexão com o banco de dados usando PDO
    $conn = new PDO("mysql:host=$host;dbname=$banco", $usuario, $senha);
    
    // Define PDO para lançar exceções em caso de erro
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Processamento do formulário quando enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Coleta os dados do formulário
        $nome = $_POST['nome'];
        $data = $_POST['data'];
        $horario = $_POST['horario'];
        $duracao = $_POST['duracao'];
        
        // Prepara a instrução SQL para inserção
        $sql = "INSERT INTO AgendamentoLaboratorio (nome, data, horario, duracao) 
                VALUES (:nome, :data, :horario, :duracao)";
        
        // Prepara a declaração
        $stmt = $conn->prepare($sql);
        
        // Bind dos parâmetros
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':horario', $horario);
        $stmt->bindParam(':duracao', $duracao);
        
        // Executa a inserção
        $stmt->execute();
        
        echo "Agendamento realizado com sucesso!";
    }
} catch(PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}

// Fecha a conexão
$conn = null;

?>
?>




<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Agendamento de Laboratório de Informática</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #007bff;
        color: #fff;
        padding: 10px 0;
        text-align: center;
    }

    nav {
        background-color: #f4f4f4;
        padding: 10px;
    }

    nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
    }

    nav ul li {
        margin-right: 20px;
    }

    .container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .form-group button {
        padding: 8px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .form-group button:hover {
        background-color: #0056b3;
    }

    footer {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 10px 0;
    }
</style>




</head>
<body>
<header>
    <h1>Agendamento de Laboratório de Informática</h1>
</header>
<nav>
    <ul>
        <li><a href="suareserva.php">Visualizar Agendamentos</a></li>
    </ul>
</nav>
<div class="container">
    <section id="agendar">
        <h2>Agendar Laboratório</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="data">Data:</label>
                <input type="date" id="data" name="data" required>
            </div>
            <div class="form-group">
                <label for="horario">Horário:</label>
                <input type="time" id="horario" name="horario" required>
            </div>
            <div class="form-group">
                <label for="duracao">Duração (horas):</label>
                <input type="number" id="duracao" name="duracao" min="1" max="4" required>
            </div>
            <div class="form-group">
                <button type="submit">Agendar</button>
            </div>
        </form>
    </section>
    <hr>
    <section id="visualizar">

 
    
</div>
<footer>
    <p>&copy; 2024 Agendamento de Laboratório de Informática</p>
</footer>
</body>
</html>
