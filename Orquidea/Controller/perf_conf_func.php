<?php

require '../Model/ModelDao/database.php';

$conn = new DatabaseUtility();
$conn->connect();
session_start();

// Se houver o campo nome, inserir ao banco
if (!empty($_POST["wnome"])){

	$conn->update_func_name($_POST["wnome"],$_SESSION["id"]);

}
// Se houver o campo CPF, inserir ao banco
if (!empty($_POST["wcpf"])){

	$conn->update_func_cpf($_POST["wcpf"],$_SESSION["id"]);

}
// Se houver o campo email, inserir ao banco

if (!empty($_POST["wemail"])){

	$conn->update_func_email($_POST["wemail"],$_SESSION["id"]);

}

// Se houver o campo TEL1, inserir ao banco
if (!empty($_POST["wtel1"])){

	$conn->update_func_tel1($_POST["wtel1"],$_SESSION["id"]);

}

// Se houver o campo TEL2, inserir ao banco
if (!empty($_POST["wtel2"])){

	$conn->update_func_tel2($_POST["wtel2"],$_SESSION["id"]);

}



echo " <a href='../View/Perfil_Funcionario.php'>Retornar</a> ";




