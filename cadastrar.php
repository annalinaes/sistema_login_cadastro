<?php 
    require_once('classes/Usuario.php');
    require_once('conexao/conexao.php');

    $database = new Conexao();
    $db = $database->getConnection();
    $usuario = new Usuario($db);

    if(isset($_POST['cadastrar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confSenha = $_POST['confsenha'];

        if($usuario->cadastrar($nome,$email,$senha,$confSenha)){
            echo "Cadastro realizado com sucesso!";
    }else{
        echo "Erro ao cadastrar!";
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
    <title>Tela de Cadastro</title>
</head>
<body>

    
<form method="POST">
    <label for="">Nome de usuario</label>
    <input type="text" name="nome" >
    <label for="">Email</label>
    <input type="email" name="email">
    <label for="">Senha</label>
    <input type="password" name="senha" maxlength=8>
    <label for="">Confirmar Senha</label>
    <input type="password" name="confsenha" maxlength=8>
    <button type="submit" name="cadastrar">cadastrar</button>
</form>
<a href="index.php">Voltar para tela de login</a>
</body>
</html>