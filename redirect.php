<?php
session_start();
$buscandoUser = $_REQUEST['buscandoUser'];
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
    <?php

    try {
        $conn = new PDO('mysql:host=localhost;dbname=SEGUNDA_QUESTAO', "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $lComp = $conn->prepare("SELECT * FROM USUARIOS WHERE `FULLNAME` = :buscandoUser ");

        $lComp->bindparam(":buscandoUser", $buscandoUser);
        $lComp->execute();
        $result = $lComp->fetchAll();

        foreach ($result as $value) {
            echo 'Nome: ', $value['FULLNAME'], '<br>', 'Usuário: ', $value['USUNOME'], '<br>', $value['EMAIL'], '<br>';
            echo "<a href='home.php'>voltar</a><br>";
        }
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    ?>

</body>

</html>