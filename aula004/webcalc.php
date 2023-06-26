<?php

require_once "classes/calcClass.php";

$n1 = $_POST['n1'];
$n2 = $_POST['n2'];
$opcao = $_POST['opcao'];


$calcClass = new CalcClass();

$calcClass->setn1($n1);
$calcClass->setn2($n2);
switch($opcao) {
    case "somar":
        $calcClass->somar();

        break;
    case "subtrair":
        $calcClass->subtrair();

        break;
    case "dividir":
        $calcClass->dividir();

        break;
    case "multiplicar":
        $calcClass->multiplicar();

        break;
    default:
        $error = TRIM("Operação inválida - Escolha uma das opções de cálculo ");

        break;
}
if ($error) {
    $result = $error;
} else {
    $result = $calcClass->getTotal();
}
header("Location:index.php?total=" . TRIM($result) . '&n1=' . TRIM($n1) . '&n2=' . TRIM($n2) . '&opcao=' . TRIM($opcao));
