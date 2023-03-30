<?php
    include("connection.php");
    include("exemplo.http");

    $texto = "\n Ola";
    echo nl2br($texto);

    // Consulta ao banco de dados PHPmyADMIN
    $sql = "SELECT * FROM odoant";
    $result = mysqli_query($mysqli, $sql);

    //Consulta para tabela 2
    $sql2 = "SELECT * FROM odoexc";
    $result2 = mysqli_query($mysqli, $sql2);

    //Consulta para tabela 3
    $sql3 = "SELECT * FROM odonto";
    $result3 = mysqli_query($mysqli, $sql3);

    //Consulta para tabela 4
    $sql4 = "SELECT * FROM odopos";
    $result4 = mysqli_query($mysqli, $sql4);

    //Criação do arquivo CSV
    $file = fopen("arq.csv", "w");

    //Escrita dos dados no arquivo CSV
    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($file, $row);
    }

    while ($row = mysqli_fetch_assoc($result2)) {
        fputcsv($file, $row);
    }
    while ($row = mysqli_fetch_assoc($result3)) {
        fputcsv($file, $row);
    }

    while ($row = mysqli_fetch_assoc($result4)) {
        fputcsv($file, $row);
    }

    //Fechamento do arquivo CSV
    fclose($file);

    // Caminho para o arquivo CSV local
    $file_path = 'arq.csv';
    $filePath = 'C:\Users\alexa\Documents\GitHub\Alexandre-Borghi-Gava\arquivo.csv'; // caminho do arquivo .csv a ser enviado
    $url = 'https://psel.apoena.shinier.com.br/api/import/create';

    // Efetua o login na API
    $loginUrl = 'https://psel.apoena.shinier.com.br/api/login';
    $username = 'alexandregavaa@gmail.com';
    $password = 'B@rgh1@2023';
    //dados de identificação do usuario
    $data = [
        'username' => $username,
        'password' => $password,
    ];
    //cria um array $options que define um contexto HTTP para uma requisição POST.
    $options = [
        'http' => [
            'header' => "Content-type: application/json\r\n",
            'method' => 'POST',
            'content' => json_encode($data),
        ]
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($loginUrl, false, $context);

    $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5OGM4ZGZhOS0zZWMwLTQ4MmUtYTA4ZC1lOGJlYzhhYmEwNDYiLCJqdGkiOiIwYWZlZTNkZGUwMDhlOGYxNGZhNmVmMjNlZTBiYjJkODZlN2Y0MDA5MWJjZjQ0NDZkYWQ5YWUxMzA2ZDZhYTIwMDQ5M2FmOTIxNzZkZmM4YSIsImlhdCI6MTY3OTk0Nzc2MC44MzAzNjUsIm5iZiI6MTY3OTk0Nzc2MC44MzAzNywiZXhwIjoxNzExNTcwMTYwLjgyMjIyNCwic3ViIjoiZDYxNTY1YTEtZTk4My00NjEyLWFlY2ItMmViMmM2YmQ0OWIwIiwic2NvcGVzIjpbXX0.gYNoi_wD1CAS7Yd7EIk50V3mgwZygiKkfHqeCkVvSI59n8fewJWmlfN8MVyH-_MCQoCxj4_6M4rYZeQB5djIM8JvMKJJA6AOVnn8KuQzPy4-nEj5wH3q4B4LvPvu8FtX1-augZD0C0UphTDN1LOCZQw3O_jFYztN3KBAwEdYgLh9P7j1GM2_o1mtgGYTtgvlEV6HvGqHMdf9O1P88VQ2Mt1TJYHjnnCxJKvXYcxVKxMTqkOc68zNsKZ1t-53MBAM9re0C4IMHrwxCfMKlMmV1gUkT3YjmbBJwI0qT-6hVlfd3iwFUE-6xib3HCi77ELz0AC53Jt49v6ZXGgx2ZU0VUjVJjLy797Xre0zZLz2ZTha4e_a9H5emI8HCJjCkcqypw8Rfh6MTwTXIPni7LDhsvIA7QVBGkmTjrNfe7EvZ1fv99uTWitpjW4fAFx68vet7JmeFoXiYGSaoVy0vnqk70S8U9uIAvVrxVJhuM2FHoTgf_DaT02_eYL5Jb_YLs-HaA8emUsKGH7UwOxeMbdMTqc6k0eChzsF2Hd-2Y4MRPi0T9E03UDrY7Bde5DW4aj_P2ylPCVV_2nu896AantQX2zfGJYIDJqLwZPl3-6_XZKNPneVN9HHzdVFhgyyOBhpMvozc7adD-35-YhPf_ItgDHrXdK5UqUcu55n73hyEpo'; // obtém o token do login

    // Envia o arquivo .csv para a API
    $fileContent = file_get_contents($filePath);

    $headers = [
        'Authorization: Bearer ' . $token,
        'Content-Type: text/csv',
    ];
    //utilizado para fazer o POST, curl_setopt é usado para configurar sessao cURL.
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fileContent);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    //mostra a resposta do que aconteceu
    if ($response === false) {
        echo 'Erro: ' . curl_error($ch);
    } else {
        echo 'Arquivo enviado com sucesso!';
    }
    //fecha a sessao cURL.
    curl_close($ch);

?>


