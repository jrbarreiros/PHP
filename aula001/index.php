<?php

echo 'teste - disco C<BR>';

$ar01 = [
    'nome',
    'endereço',
    'email',
    'celular',
];

foreach ($ar01 as $key => $value) {
    echo $key . "\t=>\t" . $value . "\n";
}

for ($i = 0; $i < 20; ++$i) {
    echo 'O Valor de I = ' . $i . " - ";
    echo $ar01[$i] . ' <br>';
}
