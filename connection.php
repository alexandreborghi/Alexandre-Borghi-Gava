<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <?php
    // Configurações de conexão com o banco de dados PostgreSQL
    $hostname = "localhost";
    $bancodedados = "banco";
    $usuario = "root";
    $senha = "";

    // Conexão com o banco de dados PostgreSQL
    $mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);

    if($mysqli->connect_errno){
        echo "falha ao conectar" . $mysqli->connect_errno . ")" . $mysqli->connect_errno;
    }else
        echo "Conectado ao Banco de dados";

 ?>



</body>
</html>