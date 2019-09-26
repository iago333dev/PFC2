    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
		echo "Bem Vindo ",$_SESSION['user'],"</br>","</br>";


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


		echo $eu->getNome(),"</br>";
		echo $eu->getCpf(),"</br>";
		echo $eu->getEmail(),"</br>";
		echo $eu->getTelefone1(),"</br>";
		echo $eu->getTelefone2(),"</br>";
		echo $eu->getDatanasc(),"</br>";









	
        
        
        

        ?>

		
    </body>
</html>