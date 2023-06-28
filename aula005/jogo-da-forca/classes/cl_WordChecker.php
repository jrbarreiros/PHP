<?php

namespace classes;

class cl_WordChecker
{
    /**
     * Função: checkAndReplace()
     *
     * @param string $userInput Entrada do usuário.
     * @param string $hidden String oculta.
     * @param array $answer Resposta.
     * @return array O array de caracteres atualizado.
     */
    public static function checkAndReplace($userInput, $hidden, $answer)
    {
        $i = 0;
        $wrongGuess = true;

        while ($i < count($answer)) {
            if ($answer[$i] == $userInput) {
                $hidden[$i] = $userInput;
                $wrongGuess = false;
            }
            $i = $i + 1;
        }

        if (!$wrongGuess) {
            $_SESSION['attempts'] = $_SESSION['attempts'] - 1;
        }

        return $hidden;
    }
}
