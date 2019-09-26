    <head>
        <meta charset="UTF-8">
        <title>Configurações de Usuario</title>
    </head>
    <body>
        <?php
        session_start();		

		echo "Configurações de Usuario </br>";

		require '../Model/ModelBean/dados.php';
		require '../Model/ModelDao/database.php';
		
		//Conexão com banco
        $conn = new DatabaseUtility();
        $conn->connect();
		
		$eu = new dados(
		    $_SESSION['user'],
		    $conn->getdatabase_cpf($_SESSION['id']),
		    $conn->getdatabase_email($_SESSION['id']),
		    $conn->getdatabase_tel1($_SESSION['id']),
		    $conn->getdatabase_tel2($_SESSION['id']),
		    $conn->getdatabase_datnasc($_SESSION['id'])
			);
        ?>

<form method="POST" action="../Controller/perf_conf_func.php">
  Nome:<br>
  <input type="text" name="wnome" placeholder="<?php echo $eu->getNome(); ?>"><br>

  CPF:<br>
  <input type="text" name="wcpf" placeholder="<?php echo $eu->getCpf(); ?>"><br>

  Email:<br>
  <input type="text" name="wemail" placeholder="<?php echo $eu->getEmail(); ?>"><br>

  Telefone:<br>
  <input type="text" name="wtel1" placeholder="<?php echo $eu->getTelefone1(); ?>"><br>

  Celular:<br>
  <input type="text" name="wtel2" placeholder="<?php echo $eu->getTelefone2(); ?>"></br>

  <input type="submit">



 <?php $conn=null; ?>

</form>
		



    </body>
</html>