<?php
    include('conexao.php');
    include('usuario.php');
    
    if(empty($_POST['fullname']) || empty($_POST['usunome']) || empty($_POST['email']) || empty($_POST['password'])){
        header('Location: index.html');
        exit();
    }
    $senha = md5($_POST['password']);
	$usuario = new Usuario($_POST['fullname'], $_POST["usunome"], $_POST["email"], $senha);  
    $fullname = $usuario->getFullname();
    $usunome = $usuario->getUsunome();
    $email = $usuario->getEmail();
    $senha = $usuario->getPassword();
    $i = 0;
    
    $lComp = $PDO->prepare("INSERT INTO `USUARIOS`(`fullname`, `usunome`, `email`, `senha`) VALUES (:fullname, :usunome, :email, :senha)");

    $search = "SELECT `fullname`,`email` FROM `USUARIOS`";
    $resultado = $PDO->query($search);
    while($row = $resultado->fetch()) {
        if($row['fullname'] == $fullname || $row['email'] == $email){
            $i++;
        }
    }

    if($i>0){
        echo "Usuário já cadastrado.";
    }else{
        $lComp->execute(array(':fullname' => $fullname, ':usunome' => $usunome, ':email' => $email, ':senha'=> $senha));
        echo "Usuario cadastrado.";
        header("Location: index.html");
    }
?>