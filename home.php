<?php
session_start();
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

        $sql = "SELECT * FROM USUARIOS";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $value) {
            echo "Usuários cadastrados:";
            echo 'Nome: ', $value['FULLNAME'], '<br>', 'Telefone: ', $value['USUNOME'], '<br>', $value['EMAIL'], '<br>';

        }
        echo "<form action='redirect.php' method='POST'>";
        echo "buscar usuário:" , "<input type=text name=buscandoUser><br>";
        echo "<input type=submit value = buscar>";
        echo "</form>";
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    ?>

</body>

</html>