<?php 
session_start();

require_once('classes/Usuario.php');
require_once('conexao/conexao.php');

$database = new Conexao();
$db = $database->getConnection();
$usuario = new Usuario($db);

if(isset($_POST['nome'])){
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    if($usuario->logar($nome, $senha)){
        $_SESSION['nome'] = $nome;

        header("Location: dashboard.php");
        exit();
    }else{
        print "<script>alert('Login inválido')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tela de login</title>
</head>
<body>

    
<form method="POST">
    <label for="Nome">Nome</label>
    <input type="nome" name="nome" placeholder="Coloque seu nome">
    <label for="Senha">Senha</label>
    <input type="password" name="senha" placeholder="Coloque sua senha">

    <button type="submit" name="logar">Logar</button>
</form>
<a href="cadastrar.php">Clique aqui para criar uma conta</a>
</body>
</html>