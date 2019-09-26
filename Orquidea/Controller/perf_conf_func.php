<?php

require '../Model/ModelDao/database.php';

$conn = new DatabaseUtility();
$conn->connect();
session_start();

if (!empty($_POST["wnome"])){

	$conn->update_func_name($_POST["wnome"],$_SESSION["id"]);

}

if (!empty($_POST["wcpf"])){

	$conn->update_func_cpf($_POST["wcpf"],$_SESSION["id"]);

}

echo " <a href='../View/Perfil_Funcionario.php'>Retornar</a> ";




