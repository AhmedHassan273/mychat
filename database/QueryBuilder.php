<?php

class QueryBuilder
{
    /**
     * The PDO instance.
     *
     * @var PDO
     */
    protected $pdo;

    /**
     * Create a new QueryBuilder instance.
     *
     * @param PDO $pdo
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Select all records from a database table.
     *
     * @param string $table
     */
    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("select * from $table");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function query($sql)
    {
        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute();
        } catch (\Exception $e) {
            //
        }
    }

    public function fetch($sql)
    {
        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute();

            return $statement->fetch(PDO::FETCH_ASSOC);
            
        } catch (\Exception $e) {
            //
        }
    }
}
