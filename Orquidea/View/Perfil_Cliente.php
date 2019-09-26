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
        echo $_SESSION['id'];
         echo $_SESSION['user'];
        ?>
    </body>
</html>
