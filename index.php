<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Recuperação - 1 aberta</title>
  </head>
  <body>
    <form action="conexao.php" method="POST">
      <label for="nome">Nome: <input type="text" name="nome" /></label
      ><br /><br />
      <label for="telefone"
        >Telefone: <input type="tel" name="telefone"
      /></label><br><br>
      <input type="submit" value="cadastrar"/>
    </form>
  </body>
</html>
