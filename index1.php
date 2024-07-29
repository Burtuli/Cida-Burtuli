
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <link rel="stylesheet" href="index1.css">
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="login" method="POST">
            <label for="username">Nome:</label>
            <input type="text" id="username" name="username" required>

            <label for="cpf">CPF:</label>
            <input type="password" id="cpf" name="cpf" required>

            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
