<?php
include('conexao.php');
include('usuario.php');
$email = $_REQUEST["email"];
$senha = $_REQUEST["password"];

$_SESSION["email"] = $email;
$_SESSION["password"] = $senha;

if (empty($email) || empty($senha)) {
    header('Location: index.html');
    exit();
} else {

    $lComp = $PDO->prepare("SELECT `EMAIL`, `SENHA` FROM usuarios WHERE `EMAIL` = :email and `SENHA` = :senha");

    $lComp->bindparam(":email", $email);
    $lComp->bindValue(":senha", md5($senha));
    $lComp->execute();

    if ($lComp->rowCount() == 0) {
        echo "Email ou senha incorretas.";

        echo "<button><a href='index.html'>Voltar</a></button>";

    } else {
        header("Location: home.php");
    }
}
