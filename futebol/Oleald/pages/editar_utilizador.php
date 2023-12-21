<?php
session_start();
if (isset($_SESSION['tipo_user'])){
    if ($_SESSION['tipo_user'] == 0){
         echo "Sem permissão";
        return;
    }
}

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "futmax";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Verifica se foi passado o ID do usuário
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Adicione esta linha para depuração
    echo "ID do utilizador da URL: " . $id;
    
    // Seleciona o usuário da base de dados
    $sql = "SELECT * FROM users WHERE id = $id";
    $resultado = mysqli_query($conn, $sql);

    // Verifica se o usuário foi encontrado
    if (mysqli_num_rows($resultado) > 0) {
        $linha = mysqli_fetch_assoc($resultado);
    } else {
        echo "Usuário não encontrado.";
        exit;
    }
} else {
    echo "ID do usuário não informado.";
    exit;
}

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    // Atualiza os dados do usuário na base de dados
    $sql = "UPDATE users SET nome = '$nome', email = '$email' WHERE id = $id";
    mysqli_query($conn, $sql);

    // Redireciona de volta para a página de gerenciamento de usuários
    header("Location: gerenciar_utilizadores.php");
    exit;
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="editar_utilizadorescss.css">
<link rel="icon" href="fotos/Capturar-removebg-preview.png">
    <title>H2auto</title>

<link rel="icon" href="./imagens/favicon-32x32.png">
    <title>Editar Usuário</title>
</head>

<body>
    <div class="container">
        <h1>Editar Usuário</h1>
        <form method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo $linha['nome']; ?>"><br>

            <label for="email">E-mail:</label>
            <input type="email" name="email" value="<?php echo $linha['email']; ?>"><br>

            <input type="submit" value="Salvar">
        </form>
    </div>
</body>
</html>