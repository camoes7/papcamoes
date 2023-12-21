<?php
session_start();

if (isset($_SESSION['tipo_user'])){
    if ($_SESSION['tipo_user'] == 0){
         echo "Sem permissão";
        return;
    }
}

// Verificar se o usuário está logado como administrador

    // Você pode verificar o papel do utilizador (administrador ou comum) aqui, se necessário
    // ...

    // Conectar ao banco de dados (substitua com suas próprias credenciais)
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "futmax";

    $conexao = new mysqli($servername, $username, $password, $database);

    if ($conexao->connect_error) {
        die('Erro na ligação com o banco de dados: ' . $conexao->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        $id = $_GET['id'];

        // Consulta para excluir o utilizador com base no ID
        $consulta = "DELETE FROM users WHERE id = $id";
        if ($conexao->query($consulta) === TRUE) {
            echo "Utilizador excluído com sucesso.";
        } else {
            echo "Erro ao excluir o utilizador: " . $conexao->error;
        }
        ?>
        
        <?php
    } else {
        echo "Requisição inválida.";
    }

    // Fechar a conexão com o banco de dados
    $conexao->close();

