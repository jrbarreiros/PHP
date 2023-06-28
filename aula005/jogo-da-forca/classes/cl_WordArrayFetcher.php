<?php

namespace classes;

class cl_WordArrayFetcher
{
    /**
     * fetchWordArray()
     *
     * @param string $wordFile Arquivo contendo as palavras.
     * @return array|null O array de caracteres contendo a palavra.
     */
    public static function fetchWordArray($wordFile)
    {
        $file = fopen($wordFile, 'r');

        if ($file) {
            $random_line = null;
            $line = null;
            $count = 0;

            while (($line = fgets($file)) !== false) {
                $count++;
                if (rand() % $count == 0) {
                    $random_line = trim($line);
                }
            }

            if (!feof($file)) {
                fclose($file);

                return null;
            } else {
                fclose($file);
            }
        }
        $answer = str_split($random_line);

        return $answer;
    }
}
