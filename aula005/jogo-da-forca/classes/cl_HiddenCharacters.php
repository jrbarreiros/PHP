<?php

namespace classes;

class cl_HiddenCharacters
{
    /**
    * Função: hideCharacters()
    *
    * @param array $answer A palavra cujos caracteres devem ser ocultados.
    * @return string A string de caracteres com os caracteres ocultos.
    */
    public static function hideCharacters($answer)
    {
        $noOfHiddenChars = floor((sizeof($answer) / 2) + 1);
        $count = 0;
        $hidden = $answer;

        while ($count < $noOfHiddenChars) {
            $rand_element = rand(0, sizeof($answer) - 2);

            if ($hidden[$rand_element] != '_') {
                $hidden = str_replace($hidden[$rand_element], '_', $hidden, $replace_count);
                $count = $count + $replace_count;
            }
        }

        return $hidden;
    }
}
