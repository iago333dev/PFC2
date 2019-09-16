<?php
//Chave que confirma se todos campos foram preenchidos
$chave = 0;

require_once '../Model/ModelBean/dados.php';
require_once '../Model/ModelDao/database.php';

//Verificando se todos os campos foram preenchidos caso positivo, chave = 1
if (!empty($_POST["wnome"])&& !empty($_POST["wcpf"]) && !empty($_POST["wemail"]) && !empty($_POST["wtel1"])
 && !empty($_POST["wtel2"]) && !empty($_POST["wender"]) && !empty($_POST["wbair"]) && !empty($_POST["wuf"])
 && !empty($_POST["wpais"])&& !empty($_POST["wnasc"]) && !empty($_POST["wlog"])&& !empty($_POST["wsen"]))
{
    $chave = 1;    
} else
   //Caso contrario pedir para que todos os campos sejam preenchidos
    { echo "Preencha todos campos";}


if($chave =1){
    //Filtrando variaveis de entrada
    $a = filter_input(INPUT_POST,'wnome' ,FILTER_DEFAULT);
    $b = filter_input(INPUT_POST,'wcpf' ,FILTER_DEFAULT);
    $c = filter_input(INPUT_POST,'wemail' ,FILTER_SANITIZE_EMAIL);
    $d = filter_input(INPUT_POST,'wtel1' ,FILTER_DEFAULT);
    $e = filter_input(INPUT_POST,'wtel2' ,FILTER_DEFAULT);
    $f = filter_input(INPUT_POST,'wender' ,FILTER_DEFAULT);
    $g = filter_input(INPUT_POST,'wbair' ,FILTER_DEFAULT);
    $h = filter_input(INPUT_POST,'wuf' ,FILTER_DEFAULT);
    $i = filter_input(INPUT_POST,'wpais' ,FILTER_DEFAULT);
    $j = filter_input(INPUT_POST,'wnasc' ,FILTER_DEFAULT);
    
    
    echo $j;
    
    //Instanciando classe dados
    $newuser = new dados($a, $b, $c, $d, $e, $f, $g, $h, $i, $j);    
    //Conexão com banco
    $conn = new DatabaseUtility();
    $conn ->connect();
    
    //Cadastrado usuarios no banco
    $conn->cadas_dados(
     $newuser->GetNome(), $newuser->GetCpf(), $newuser->GetEmail(),
     $newuser->GetTelefone1(),$newuser->GetTelefone2(), $newuser->GetEndereco(),
     $newuser->GetBairro(), $newuser->GetUf(),$newuser->GetNacionalidade(), $newuser->GetDatanasc());
    
    //Desconectar
    $conn->disconect();
    
  

    
    
}


