<?php
include_once('config.php');

// Verifica se houve um envio de formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $email = $_POST["email"]; 
    $cpf = $_POST["cpf"]; 

    // Validação básica (adicione mais validações conforme necessário)
    if (empty($email) || empty($cpf)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        // Definindo a consulta SQL
        $sql = "SELECT * FROM clientes WHERE email=? AND cpf=?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ss", $email, $cpf); // Assumindo que email e cpf são strings

        // Executa a consulta
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                // Verifica o tipo de usuário (campo 'tipo' no banco de dados)
                if (isset($row['tipo']) && $row['tipo'] == 1) {
                    // Login válido para administrador, redireciona para adm.php
                    header("Location: adm1.php");
                    exit;
                } else {
                    // Login válido para outro tipo de usuário, redireciona para reserva.php
                    header("Location: reserva.php");
                    exit;
                }
            } else {
                echo "Email ou CPF inválidos.";
            }
        } else {
            // Trata erros na execução da consulta
            echo "Erro ao realizar a consulta: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="login.php" method="POST">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <label for="cpf">CPF:</label>
            <input type="password" id="cpf" name="cpf" required>

            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
