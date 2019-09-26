<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        echo "Bem Vindo </br>";
        $_SESSION['id'];
        echo $_SESSION['user'];

        ?>
		 <a href="../Controller/perf_conf.php">Configurações de Usuario</a> 
		
    </body>
</html>
