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
        echo "hello world\n";
        // Substitua pelos seus próprios valores de configuração
        $host = 'localhost:3000';
        $dbname = 'EMD 101';
        $username = 'nome_de_usuario';
        $password = '1234';

// Cria a conexão com a base de dados
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        } catch (PDOException $e) {
            die("Erro ao conectar com a base de dados: " . $e->getMessage());
        }

    ?>


</body>
</html>