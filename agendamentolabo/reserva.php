<?php
include_once('config.php');

// Configuração do banco de dados
$host = "localhost"; // Endereço do servidor do banco de dados
$usuario = "root"; // Usuário do banco de dados
$senha = ""; // Senha do banco de dados
$banco = "reserva_de_lab"; // Nome do banco de dados

try {
    // Conexão com o banco de dados usando PDO
    $conn = new PDO("mysql:host=$host;dbname=$banco", $usuario, $senha);
    
    // Define PDO para lançar exceções em caso de erro
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Função para verificar conflitos de horários
    function verificarConflito($data, $horario, $duracao, $conn) {
        // Converte a data e hora de início e fim para DATETIME
        $data_inicio = date("Y-m-d H:i:s", strtotime("$data $horario"));
        $data_fim = date("Y-m-d H:i:s", strtotime("$data_inicio +$duracao minutes"));

        // SQL para verificar se existe algum agendamento que se sobrepõe
        $sql = "SELECT * FROM AgendamentoLaboratorio 
                WHERE data = :data
                AND (
                    (:data_inicio < DATE_ADD(horario, INTERVAL duracao MINUTE) AND :data_fim > horario)
                )";
        
        // Prepara a declaração
        $stmt = $conn->prepare($sql);

        // Bind dos parâmetros
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':data_inicio', $data_inicio);
        $stmt->bindParam(':data_fim', $data_fim);
        
        // Executa a consulta
        $stmt->execute();

        // Se encontrar algum registro, significa que há conflito
        return $stmt->rowCount() > 0;
    }

    // Processamento do formulário quando enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Coleta os dados do formulário
        $nome = $_POST['nome'];
        $data = $_POST['data'];
        $horario = $_POST['horario'];
        $duracao = $_POST['duracao'] * 60; // Converte horas para minutos

        // Verifica se há conflito de horários
        if (verificarConflito($data, $horario, $duracao, $conn)) {
            echo "Este horário já está reservado. Por favor, escolha outro.";
        } else {
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
    }
} catch(PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}

// Fecha a conexão
$conn = null;
?>





<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Agendamento de Laboratório de Informática</title>
<link rel="stylesheet" href="reserva.css">
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
