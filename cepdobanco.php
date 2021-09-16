<?php

function findByCepDatabase(String $cep, mysqli $conn): object
{
    $cep = mysqli_real_escape_string($conn, $cep);
    $query = "SELECT * FROM cep WHERE cep = '{$cep}'";
    return mysqli_query($conn, $query);
}


function saveAddresDatabase(object $address,  mysqli $conn): bool
{
    $cep = filterCEP(mysqli_real_escape_string($conn, $address->cep));
    $logradouro = mysqli_real_escape_string($conn, $address->logradouro);
    $complemento = mysqli_real_escape_string($conn, $address->complemento);
    $bairro = mysqli_real_escape_string($conn, $address->bairro);
    $localidade = mysqli_real_escape_string($conn, $address->localidade);
    $uf = mysqli_real_escape_string($conn, $address->uf);
    $ibge = mysqli_real_escape_string($conn, $address->ibge);
    $gia = mysqli_real_escape_string($conn, $address->gia);
    $ddd = mysqli_real_escape_string($conn, $address->ddd);
    $siafi = mysqli_real_escape_string($conn, $address->siafi);

    $query = "INSERT INTO cep (cep, logradouro, complemento, bairro, localidade, uf, ibge, gia, ddd, siafi) VALUES ('{$cep}','{$logradouro}','{$complemento}','{$bairro}','{$localidade}','{$uf}','{$ibge}','{$gia}','{$ddd}','{$siafi}')";
    
    return mysqli_query($conn, $query);;
}
