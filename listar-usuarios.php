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
    echo "<br> O usuário cadastrado recentemente: nome" . $_SESSION["nome"] . " e seu telefone é " . $_SESSION["telefone"];

    try {
        $conn = new PDO('mysql:host=localhost;dbname=PRIMEIRA_QUESTAO', "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM USUARIO";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $value) {
            echo '<h6>Nome: ', $value['NOME'], '</h6><br>', '<h6>Telefone: ', $value['TELEFONE'], '</h6><br>';
        }
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
    ?>

</body>

</html>