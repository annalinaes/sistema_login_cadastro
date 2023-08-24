<?php 
session_start();

if(!isset($_SESSION['nome'])){
    header("Location: index.php");
    exit();
}

$nome = $_SESSION['nome'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Painel de controle</h1>
    <p>Seja bem vindo(a)! <?php echo $nome; ?> </p>

    <a href="logout.php">Sair</a>
    
</body>
</html>