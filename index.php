<?php
    include("connection.php");
    include("exemplo.http");

    $texto = "\n Ola";
    echo nl2br($texto);

    // Consulta ao banco de dados PHPmyADMIN
    $sql = "SELECT * FROM banco";
    $result = mysqli_query($mysqli, $sql);
    // Criação do arquivo CSV
    $filename = "informacoes.csv";
    $file = fopen($filename, 'w');
    $header = array('linha', 'coluna', 'codigo_resp', 'nome_resp', 'especialidade', 'usuario');
    fputcsv($file, $header);

    // Loop pelos resultados da consulta
    while ($row = mysqli_fetch_assoc($result)) {
    // Escreve uma linha no arquivo CSV com os dados da linha atual
    $data = array(
        $row['linha'],
        $row['coluna'],
        $row['codigo_resp'],
        $row['nome_resp'],
        $row['especialidade'],
        $row['usuario']
    );
    fputcsv($file, $data);
    }

    // Fecha o arquivo
    fclose($file);

    // Envio do arquivo CSV para a API
    $url = "https://psel.apoena.shinier.com.br/api/import/create";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, array('file' => new CURLfile($filename)));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    // Exibe a resposta da API
    echo "Resposta da API: " . $response;

    // Fecha a conexão com o banco de dados MySQL PHPmyADMIN
    mysqli_close($mysqli);
?>


