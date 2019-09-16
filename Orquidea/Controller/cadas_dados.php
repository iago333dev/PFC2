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


if($chave == 1){
    
    $login = filter_input(INPUT_POST,'wlog' ,FILTER_DEFAULT);
    $senha = filter_input(INPUT_POST,'wsen' ,FILTER_DEFAULT);
    
    //Filtrando variaveis de entrada
    $a = filter_input(INPUT_POST,'wnome' ,FILTER_DEFAULT);
    $b = filter_input(INPUT_POST,'wcpf' ,FILTER_DEFAULT);
    $c = filter_input(INPUT_POST,'wemail' ,FILTER_SANITIZE_EMAIL);
    $d = filter_input(INPUT_POST,'wtel1' ,FILTER_DEFAULT);
    $e = filter_input(INPUT_POST,'wtel2' ,FILTER_DEFAULT);
    $f = filter_input(INPUT_POST,'wnasc' ,FILTER_DEFAULT);

    //Instanciando classe dados
    $newuser = new dados($a, $b, $c, $d, $e, $f); 
    
    $newuser->SetAcesso($login, $senha);    
    //Conexão com banco
    $conn = new DatabaseUtility();
    $conn ->connect();
    
    
   $id = $conn->find_id($newuser->GetLogin());
   
   
   $newuser->SetAcesso($login, $senha);
   
   $conn->insert_user($newuser->GetLogin(), $newuser->GetSenha(),$id);
   
   // Tabela Endereço
   
   $log = filter_input(INPUT_POST,'wender' ,FILTER_DEFAULT);
   $bai = filter_input(INPUT_POST,'wbair' ,FILTER_DEFAULT);
   $cep = filter_input(INPUT_POST,'wcep' ,FILTER_DEFAULT);
   $cid = filter_input(INPUT_POST,'wcid' ,FILTER_DEFAULT);
   $uf = filter_input(INPUT_POST,'wuf' ,FILTER_DEFAULT);
   $pais = filter_input(INPUT_POST,'wpais' ,FILTER_DEFAULT);
   
   //Instanciando Classe
   
   $newuser->SetEndereco($log, $bai, $cep, $cid, $uf, $pais);
   
   // Inserir ao Banco Usuario
   $conn->insert_ender(
          $newuser->GetLogradouro(),
          $newuser->GetBairro(),
          $newuser->GetCep(),
          $newuser->GetCidade(),
          $newuser->GetUf(),
          $newuser->GetPais());
   
   $ender_id = $conn->find_ender_id($newuser->GetCep());
   
   
   $emp_nome = filter_input(INPUT_POST,'wemnome' ,FILTER_DEFAULT);
   $emp_cnpj = filter_input(INPUT_POST,'wemcnpj' ,FILTER_DEFAULT);
   $conn->cadas_empres($emp_nome, $emp_cnpj, $ender_id);
   
   $emp_id = $conn->find_emp_id($emp_cnpj);
   
   
    //Cadastrado usuarios no banco
    $conn->cadas_func(
     $newuser->GetNome(), $newuser->GetCpf(), $newuser->GetEmail(),
     $newuser->GetTelefone1(),$newuser->GetTelefone2(), $newuser->GetDatanasc(),$id,$ender_id,$emp_id);
    

    //Desconectar
    $conn = null;
    
  

    
    
}


