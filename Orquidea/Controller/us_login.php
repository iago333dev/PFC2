<?php

require '../Model/ModelBean/us_login.php';
require '../Model/ModelDao/database.php';

session_start();
if (!empty($_POST["usuario"])&& !empty($_POST["senha"])){
    $user = $_POST["usuario"];
    $password = $_POST["senha"];
    

    
    $login = new us_login(md5($user),md5($password));
    
    $conn = new DatabaseUtility();
    $conn->connect();
    $conn->login($login->getLogin(),$login->getSenha());
    
    if ($conn->login($login->getLogin(),$login->getSenha()) == "Cliente"){        
        $_SESSION['id'] = $conn->login_id_test($login->getLogin(),$login->getSenha());
        $_SESSION['user'] = $conn->login_id_nome($_SESSION['id']);
        
        header("location: ../View/Perfil_Cliente.php");
        exit;
    } else if ($conn->login($login->getLogin(),$login->getSenha()) == "Funcionario"){
        $_SESSION['id'] = $conn->login_id_test($login->getLogin(),$login->getSenha());
        $_SESSION['user'] = $conn->login_id_nome2($_SESSION['id']);
        header("location: ../View/Perfil_Funcionario.php");
        exit;
    } else if($conn->login($login->getLogin(),$login->getSenha()) == "Adm"){
        $_SESSION['id'] = $conn->login_id_test($login->getLogin(),$login->getSenha());
        header("location: ../View/Perfil_Adm.php");
        exit;
    }
    
 
}

