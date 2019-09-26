<?php

require '../Model/ModelDao/database.php';

$conn = new DatabaseUtility();
$conn->connect();
session_start();

if (!empty($_POST["wnome"])){

	$conn->update_func_name($_POST["wnome"],$_SESSION["id"]);

}





