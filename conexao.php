<?php
session_start();
$nome = $_REQUEST["nome"];
$telefone = $_REQUEST["telefone"];

$_SESSION["nome"] = $nome;
$_SESSION["telefone"] = $telefone;

try {
    $conn = new PDO('mysql:host=localhost;dbname=PRIMEIRA_QUESTAO', "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare('INSERT INTO USUARIO VALUES(?,?)');
    $stmt->bindParam(1, $nome, PDO::PARAM_STR);
    $stmt->bindParam(2, $telefone, PDO::PARAM_INT);

    $stmt->execute();
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
   <a href="listar-usuarios.php">Verificar usuários cadastrados</a>
</body>

</html>