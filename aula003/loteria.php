<?php
/**
 * Loteria:
 * instruções: Você deve digitar os 6 números da sua aposta e o sistema vai sortear aleatóriamente os números e verificará se você acertou
 * ex:
 * 1 10 22 35 5 15 --> números escolhidos pelo usuário
 * 10 12 18 40 43 58 --> números sorteados aleatóriamente pelo sistema
 * 10  --> Número de sorteado e escolhido pelo usuário
 */

class loteria
{
    public $error;
    public $sizeAr;
    public $result = 0 ;
    public $numbersRaffle;
    // Start
    public function jogo($ar1)
    {
        $validateVar = '';
        $this->sizeAr = sizeof($ar1);
        if ($this->sizeAr === 6) {
            foreach ($ar1 as $id => $var) {
                $validateVar = ($ar1[$id]);
                if ($this->error == '') {
                    $this->error = $this->validate($validateVar);
                    $this->error = $this->verifyDuplicate($ar1);
                }
            }
            if ($this->error != '') {
                $aRand = $this->numbersRaffle = $this->randonNumbers();
                echo 'Números sorteados:' . PHP_EOL;
                $xRand = "";
                foreach ($aRand  as  $nRand) {
                    $xRand .= $nRand . ' ';
                }
                echo $xRand . PHP_EOL;
                $this->numbersRaffle = $this->verifyNumbers($ar1, $aRand);
            }
        } else {
            echo ' Quantidade de número errada, você deve informar 6 números e informou ' . $this->sizeAr . PHP_EOL;
        }
    }
    // validate var
    public function validate($validateVar)
    {
        if (!is_numeric($validateVar) || $validateVar <= 0 || $validateVar >= 61) {
            $this->error = 'Erro nos números informados, favor digitar números únicos entre 1 e 60: ' . $validateVar . PHP_EOL;
            echo $this->error . PHP_EOL;;

            return $this->error;
        }
    }
        public function verifyDuplicate($ar1)
        {
            $arr = array_count_values($ar1);
            foreach ($arr as $key => $value) {
                if ($value > 1) {
                    $this->error = 'Existem valores repetidos, favor digitar números únicos entre 1 e 60' . $key . '<br>';
                    echo $this->error . PHP_EOL;

                    return $this->error;
                }
            }
        }
    // Prepare and axecute calc
    public function randonNumbers()
    {
        $aRand = [];
        while (count($aRand) < 6) {
            $nrand = rand(1, 60);
            if (!in_array($nrand, $aRand)) {
                $aRand[] = $nrand;
            }
        }

        return $aRand;
    }
    public function verifyNumbers($ar1, $aRand)
    {
        $nHits = [];
        $numbersHits = "" ;
        foreach ($ar1  as  $nAr1) {
            if (in_array($nAr1, $aRand)) {
                array_push($nHits, $nAr1);
                $numbersHits .= $nAr1 . ' ';
            }
        }
        $xHits = count($nHits);
        if ($xHits < 0) {
            $xHits = 0;
        }

        switch ($xHits) {
            case 0:
                $hits = 'Você está com pouca sorte, não acertou nenhum número no sorteio' ;

                break;
            case 1:
                $hits = "Não foi desta vez! Você acertou um número no sorteio. Veja seu acerto: $numbersHits" ;

                break;
            case 6:
                $hits = "Parabéns! Você acertou todos os números. Veja sua sorte grande: $numbersHits" ;

                break;
            default:
                $hits = "Não foi desta vez! Você acertou $xHits números no sorteio. Veja seus acertos: $numbersHits" ;

                break;
        }
        echo $hits . PHP_EOL;
    }
}
$jogo = new loteria();
echo "Entre com os números para o sorteio" . PHP_EOL;
$ar1 = explode(' ', readline());
$jogo->jogo($ar1);
