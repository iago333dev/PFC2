<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
    
    //Login
    $login = filter_input(INPUT_POST,'wlog' ,FILTER_DEFAULT);
    $senha = filter_input(INPUT_POST,'wsen' ,FILTER_DEFAULT);
    
    //Dados Pessoais
    $nome = filter_input(INPUT_POST, 'wnome' ,FILTER_SANITIZE_STRING);
    $cpf = filter_input(INPUT_POST, 'wcpf' ,FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'wemail' ,FILTER_SANITIZE_STRING);
    $telefone = filter_input(INPUT_POST, 'wtel1' ,FILTER_SANITIZE_STRING);
    $celular = filter_input(INPUT_POST, 'wtel2' ,FILTER_SANITIZE_STRING);
    $data = filter_input(INPUT_POST, 'wnasc' ,FILTER_SANITIZE_STRING);
    
    //Endereço
    $endereco = filter_input(INPUT_POST, 'wender', FILTER_SANITIZE_STRING);
    $bairro = filter_input(INPUT_POST, 'wbair', FILTER_SANITIZE_STRING);
    $cep = filter_input(INPUT_POST, 'wcep', FILTER_SANITIZE_STRING); 
    $cidade = filter_input(INPUT_POST, 'wcid', FILTER_SANITIZE_STRING); 
    $uf = filter_input(INPUT_POST, 'wuf', FILTER_SANITIZE_STRING); 
    $pais = filter_input(INPUT_POST, 'wpais', FILTER_SANITIZE_STRING); 
    
    //Instanciando a classe Dados
    $dados = new dados($nome, $cpf, $email, $telefone, $celular, $data);
    
    $dados->SetAcesso($login, $senha);
    $dados->SetEndereco($endereco, $bairro, $cep, $cidade, $uf, $pais);
    
    //Banco
    
   $conn = new DatabaseUtility();
   $conn->connect();   
   $conn->insert_login_cliente(md5($dados->GetLogin()), md5($dados->GetSenha()));
   $login_id = $conn->find_id(md5($dados->GetLogin()));
   $conn->insert_ender($endereco, $bairro, $cep, $cidade, $uf, $pais);
   $end_id = $conn->find_ender_id($cep);
   $conn->cadas_cliente($dados->GetNome(), $dados->GetCpf(), $dados->GetEmail(), $dados->GetTelefone1(), $dados->GetTelefone2(), $dados->GetDatanasc(), $login_id, $end_id);
}