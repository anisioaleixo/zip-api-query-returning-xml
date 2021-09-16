<?php
include_once('cepdoviace.php');
include_once('cepdobanco.php');

function getAddress(mysqli $conn)
{
    if (isset($_POST['cep'])) {

        $cep = $_POST['cep'];
        $cep = filterCEP($cep);

        if (isCEP($cep)) {
            $address = findCEPOrDatabaseOrViacep($cep, $conn);
        } else {
            $address = addressEmpty();
            $address->cep = 'Cep inválido!';
        }
    } else {
        $address = addressEmpty();
    }

    return $address;
}

function findCEPOrDatabaseOrViacep(String $cep, mysqli $conn): object
{
    $result = findByCepDatabase($cep, $conn);
    $row = mysqli_num_rows($result);

    if ($row > 0) {
        $result =  mysqli_fetch_assoc($result);
        $address = (object) $result;
        return $address;
    }

    $address = getAddressViaCep($cep);

    if (property_exists($address, 'erro')) {
        $address = addressEmpty();
        $address->cep = 'CEP não existe!';
        
        return $address;
    }

    $sauvou=saveAddresDatabase($address, $conn);

    return $address;
}

function filterCEP(String $cep): String
{
    return preg_replace('/[^0-9]/', '', $cep);
}

function isCEP(String $cep): bool
{
    return preg_match('/^[0-9]{5}-?[0-9]{3}$/', $cep);
}
