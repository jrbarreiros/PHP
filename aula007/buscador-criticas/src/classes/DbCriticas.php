<?php

class DbCriticas
{
    private $conexao;

    public function __construct($dbFile)
    {
        $dsn = 'sqlite:' . $dbFile;
        $this->conexao = new PDO($dsn);
        $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function createTable($table)
    {
        $sql = "CREATE TABLE IF NOT EXISTS $table (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            texto TEXT,
            nota TEXT
        );";
        $this->conexao->exec($sql);
    }

    public function insertData($table, $texto, $nota)
    {
        $sql = "INSERT INTO $table (texto, nota) VALUES (:texto, :nota)";
        $consulta = $this->conexao->prepare($sql);
        $consulta->bindParam(':texto', $texto);
        $consulta->bindParam(':nota', $nota);
        $consulta->execute();
    }

    public function getAllData($table)
    {
        $sql = "SELECT * FROM $table";
        $consulta = $this->conexao->query($sql);

        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataByText($table, $texto)
    {
        $sql = "SELECT * FROM $table WHERE texto = :texto";
        $consulta = $this->conexao->prepare($sql);
        $consulta->bindParam(':texto', $texto);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    public function dropTable($table)
    {
        $sql = "DROP TABLE IF EXISTS $table";
        $this->conexao->exec($sql);
    }

    public function dropDatabase($dbFile)
    {
        if (file_exists($dbFile)) {
            unlink($dbFile);
        }
    }
}
