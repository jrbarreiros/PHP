<?php

spl_autoload_register(
    function ($class) {
        $baseDir = __DIR__ . '/';
        $clFile = $baseDir . str_replace('\\', '/', $class) . '.php';
        if (file_exists($clFile)) {
            require $clFile;
        } else {
            echo "<br>Recurso $class não encontrado.";
        }
    }
);
