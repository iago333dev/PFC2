<?php
    require '../Model/ModelBean/empresa.php';
    require '../Model/ModelDao/database.php';

if (!empty($_POST["wnome"])&& !empty($_POST["wcnpj"]) && !empty($_POST["wcontato1"]) && !empty($_POST["wcontato2"])
 && !empty($_POST["wendereco"]) && !empty($_POST["wbairro"]) && !empty($_POST["wuf"])) {
    
    
    
   
    $nome =  $_POST["wnome"];
    $cnpj =  $_POST["wcnpj"];
    $contato1 =  $_POST["wcontato1"];
    $contato2 =  $_POST["wcontato2"];
    $endereco =  $_POST["wendereco"];
    $bairro =  $_POST["wbairro"];
    $uf =  $_POST["wuf"];

    
 $empres = new empresa($nome,$cnpj,$contato1,$contato2,$endereco,$bairro,$uf); 
 
 echo $empres->GetNome();
 echo $empres->GetCnpj();
 echo $empres->GetContato1();
 echo $empres->GetContato2();
 echo $empres->GetEndereco();
 echo $empres->GetBairro();
 echo $empres->GetUf();

  $conn = new DatabaseUtility();
  $conn->connect();
  
  $conn->cadas_empres(
        $empres->GetNome(), 
        $empres->GetCnpj(),
        $empres->GetContato1(),
        $empres->GetContato2(), 
        $empres->GetEndereco(), 
        $empres->GetBairro(), 
        $empres->GetUf());
  
// Fecha conexão
$conn->disconect();  
        
    
 } else {
    echo 'Faltou Algo </br>';
    echo '<a href="../index.php" >Retornar</a>';
}


