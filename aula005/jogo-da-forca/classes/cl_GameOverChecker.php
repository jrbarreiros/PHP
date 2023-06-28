<?php

namespace classes;

class cl_GameOverChecker
{
    /**
     * Função: checkGameOver()
     *
     * @param int $MAX_ATTEMPTS O número máximo de tentativas.
     * @param int $userAttempts O número de tentativas feitas pelo usuário.
     * @param array $answer O array de caracteres contendo a resposta.
     * @param string $hidden A string oculta.
     * @return void
     */
    public static function checkGameOver($MAX_ATTEMPTS, $userAttempts, $answer, $hidden)
    {
        if ($userAttempts >= $MAX_ATTEMPTS) {
            echo "<br><br>Fim de jogo. A palavra correta era <br>";
            foreach ($answer as $letter) {
                echo '<p class="resp" >' . $letter . '</p';
            }
            echo '<br><form action="" method="post"><br><input class="button" type="submit" name="newWord" value="Tentar outra palavra"/></form><br>';
            die();
        }

        if ($hidden == $answer) {
            echo "Fim de jogo. A palavra correta é realmente <br><br>";
            foreach ($answer as $letter) {
                echo '<p class="resp" >' . $letter . '</p';
            }
            echo '<br><form action="" method="post"><br><input class="button" type="submit" name="newWord" value="Tentar outra palavra"/></form><br>';
            die();
        }
    }
}
