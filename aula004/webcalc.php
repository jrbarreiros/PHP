<?php
/**
 * Calculadora:
 * instruções: Receberá os números e a operação selecionada no form (webCalculator.html)
 * Fará a verificação de qual operação foi solicitada e chama a função correta.
 */
// Input ( os dados ficarão em um array)

// Receive from html form

require_once 'webcalc.php';

$numb1 = $_POST["numb1"];
$numb2 = $_POST["numb2"];
$opcao = $_POST["opcao"];

switch($opcao) {
    case 'somarS': $result = $numb1 + $numb2;

        break;
    case 'subtrair': $result = $numb1 - $numb2;

        break;
    case 'dividir': $result = $numb1 / $numb2;

        break;
    case 'multiplicar': $result = $numb1 * $numb2;

        break;
}

echo $result;

// $calculate = new calculadora();
// echo "Entre com os números e a operação desejada no final" . PHP_EOL;
// $ar1 = explode(' ', readline());
// $calculate->calc($ar1);
