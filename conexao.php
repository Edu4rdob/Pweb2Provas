<?php
  try {
      
    $PDO = new PDO('mysql:host=localhost;dbname=SEGUNDA_QUESTAO', "root", "");
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
  } catch(PDOException $e) {
    echo 'Erro de conexão: ' . $e->getMessage();
  }
?>