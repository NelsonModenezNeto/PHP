<?php

    //Retorna Valores de um Json

    $cep = "123456";
    $link = "https://viacep.com.br/ws/$cep/json/";

    $cn = curl_init($link);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $response = curl_exec($ch);

    $dados = json_decode($response, true);

    print_r($dados);

    echo $dados("logradouro");
    echo "<br>";
    echo $dados("bairro");

?>