<?php


class QueryBuilder
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function all($table, $intoClass)
    {
        $statement = ($this->pdo->prepare("SELECT * FROM `{$table}` limit 10;"));
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, $intoClass);
    }
}