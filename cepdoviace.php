<?php

function getAddressViaCep(String $cep): object
{
    $url = "https://viacep.com.br/ws/{$cep}/json/";
    return json_decode(file_get_contents($url));
}

function addressEmpty()
{
    return (object) [
        'cep' => "",
        'logradouro' => "",
        'complemento' => "",
        'bairro' => "",
        'localidade' => "",
        'uf' => "",
        'ibge' => "",
        'gia' => "",
        'ddd' => "",
        'siafi' => ""
    ];
}
