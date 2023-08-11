<?php 
session_start();

require_once('classes/Usuario.php');
require_once('conexao/conexao.php');

$database = new Conexao();
$db = $database->getConnection();
$usuario = new Usuario($db);

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if($usuario->logar($email, $senha)){
        $_SESSION['email'] = $email;

        header("Location: dashboard.php");
        exit();
    }else{
        print "<script>alert('Login invalido')</script>";
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
</head>
<body>

    
<form method="POST">
    <label for="Email">E-mail</label>
    <input type="email" name="email" placeholder="Coloque seu email">
    <label for="Senha">Senha</label>
    <input type="password" name="senha" placeholder="Coloque sua senha">

    <button type="submit" name="logar">Logar</button>
</form>
<a href="cadastrar.php">Clique aqui para criar uma conta</a>
</body>
</html>