<?php
// Inclui o arquivo de configuração
include_once('config.php');

// Verifica se o formulário foi enviado
if (isset($_POST['update'])) {
    // Sanitiza os dados do formulário para evitar injeção de SQL
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
    $endereco = mysqli_real_escape_string($conexao, $_POST['endereco']);
    $cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);
    $estado = mysqli_real_escape_string($conexao, $_POST['estado']);
    $cep = mysqli_real_escape_string($conexao, $_POST['cep']);
    $tipo = mysqli_real_escape_string($conexao, $_POST['tipo']);

    // Prepara a consulta SQL utilizando prepared statements
   
    //
    $sqlUpdate = "UPDATE clientes SET nome=?, cpf=?, email=?, telefone=?, endereco=?, cidade=?, estado=?, tipo=? WHERE email=?";
    $stmt = $conexao->prepare($sqlUpdate);
    $stmt->bind_param("sssssssss", $nome, $cpf, $email, $telefone, $endereco, $cidade, $estado, $tipo, $email);



    // Executa a consulta
    if ($stmt->execute()) {
        echo "Dados atualizados com sucesso!";
    } else {
        echo "Erro ao atualizar dados: " . $stmt->error;
    }

    // Fecha o statement
    $stmt->close();
}

// Redireciona para a lista de clientes
header('Location: adm.php');
?>