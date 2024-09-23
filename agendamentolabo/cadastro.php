<?php
include_once('config.php');

// Verificar conexão com o banco de dados
if ($conexao->connect_error) {
    die("Erro de conexão com o banco de dados: " . $conexao->connect_error);
}

// Verificar se os dados do formulário foram enviados
if (isset($_POST['nome']) && isset($_POST['cpf']) && isset($_POST['email']) && isset($_POST['telefone']) && isset($_POST['endereco']) && isset($_POST['cidade']) && isset($_POST['estado']) && isset($_POST['cep']) ) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];

    // Usar declarações preparadas para verificar se o e-mail já existe
    $sql_verifica_email = "SELECT COUNT(*) FROM clientes WHERE email = ?";
    $stmt = $conexao->prepare($sql_verifica_email);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        echo "Erro: E-mail já cadastrado. Tente outro e-mail.";
    } else {
        // Se o e-mail não existir, prosseguir com a inserção usando declarações preparadas
        $sql_insert = "INSERT INTO clientes (nome, cpf, email, telefone, endereco, cidade, estado, cep) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql_insert);
        $stmt->bind_param('ssssssss', $nome, $cpf, $email, $telefone, $endereco, $cidade, $estado, $cep);

        if ($stmt->execute()) {
            // Redireciona para a página de login após o cadastro bem-sucedido
            header("Location: login.php");
            exit(); // Garantir que o script pare de executar após o redirecionamento
        } else {
            echo "Erro ao cadastrar: " . $stmt->error;
        }
        
        $stmt->close();
    }
} else {
    echo "Erro: Dados do formulário não enviados corretamente.";
}

$conexao->close();
?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro.css"> 
    <title>Cadastro</title>
</head>
<body>
<div class="logo"></div>
<h2>Cadastro de Usuário</h2>
<form action="cadastro.php" method="post">
    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome" required><br>

    <label for="cpf">CPF:</label><br>
    <input type="text" id="cpf" name="cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" placeholder="000.000.000-00" required><br>

    <label for="email">E-mail:</label><br>
    <input type="email" id="email" name="email" required><br>

    <label for="telefone">Telefone:</label><br>
    <input type="tel" id="telefone" name="telefone" pattern="\([0-9]{2}\) [0-9]{4,5}-[0-9]{4}" placeholder="(00) 00000-0000" required><br>

    <label for="endereco">Endereço:</label><br>
    <input type="text" id="endereco" name="endereco" required><br>

    <label for="cidade">Cidade:</label><br>
    <input type="text" id="cidade" name="cidade" required><br>

    <label for="estado">Estado:</label><br>
    <input type="text" id="estado" name="estado" maxlength="2" required><br>

    <label for="cep">CEP:</label><br>
    <input type="text" id="cep" name="cep" pattern="\d{5}-\d{3}" placeholder="00000-000" required><br>

    <input type="submit" value="Cadastrar">
</form>
</body>
</html>
