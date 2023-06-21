<?php
/**
 * Calculadora:
 * instruções: Você deve digitar os números que deseja e qual operação(+ - * /) deverá ser realizada
 * ex:
 * 10 5 15 +    soma --> o resultado será (25+5+15) = 45
 * 10 5  /      dividir --> o resultado será (25/5/15) = 2
 * 100 5 15 -   subtrair --> o resultado será (25-5-15) = 80
 * 10 5 *       multiplicar --> o resultado será (25*5*15) = 50
 */
// Input ( os dados ficarão em um array)

class calculadora
{
    public $error;
    public $sizeAr;
    public $result = 0 ;
    public $operator;
    // Start
    public function calc($ar1)
    {
        $validateVar = '';
        foreach ($ar1 as $id => $var) {
            $validateVar = ($ar1[$id]);
            if ($this->error == '') {
                $this->error = $this->validate($validateVar);
            }
            $this->sizeAr = sizeof($ar1);
            $this->sizeAr--;
        }
        $xc = $this->result = $this->execCalc($ar1, $ar1[$this->sizeAr]);
        echo 'O resultado da sua conta é :' . $xc . PHP_EOL;
    }
    // validate var
    public function validate($validateVar)
    {
        if (is_numeric($validateVar)) {
        } elseif ($validateVar === '+' || $validateVar === '-' || $validateVar === '/' || $validateVar === '*') {
        } else {
            $this->error = 'Dados informados contém erro, favor verificar: ' . $validateVar . PHP_EOL;
            echo $this->error;

            return $this->error;
        }
    }
    // Prepare and axecute calc
    public function execCalc($ar1, $op)
    {
        $num = sizeof($ar1);
        $operator = $ar1[$num - 1] ;
        $num = $num - 2;
        for ($i = 0; $i <= $num ;$i++) {
            switch ($operator) {
                case '+':
                    $this->result = $this->result + (int)$ar1[$i];
                    if ($this->result <= 0) {
                        $this->result = (int)$ar1[$i];
                    }

                    break;
                case '-':
                    $this->result = $this->result - (int)$ar1[$i];
                    if ($this->result <= 0) {
                        $this->result = (int)$ar1[$i];
                    }

                    break;
                case '*':
                    $this->result = $this->result * (int)$ar1[$i];
                    if ($this->result <= 0) {
                        $this->result = (int)$ar1[$i];
                    }

                    break;
                case '/':
                    $this->result = $this->result / (int)$ar1[$i];
                    if ($this->result <= 0) {
                        $this->result = (int)$ar1[$i];
                    }

                    break;
            }
        }

        return $this->result;
    }
}
$calculate = new calculadora();
echo "Entre com os números e a operação desejada no final" . PHP_EOL;
$ar1 = explode(' ', readline());
$calculate->calc($ar1);
