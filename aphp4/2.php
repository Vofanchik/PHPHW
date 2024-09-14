<?php

interface DatabaseWrapper
{
    public function insert(array $tableColumns, array $values): array;
    public function update(int $id, array $values): array;
    public function find(int $id): array;
    public function delete(int $id): bool;
    public function get(array $filters): array;
}

class BaseDataClass implements DatabaseWrapper
{
    protected $pdo;
    protected $table;

 

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function insert(array $tableColumns, array $values): array
    {
        
        $stmt = $this->pdo->prepare("INSERT INTO {$this->table} (" 
                                    . implode(',', $tableColumns) 
                                    . ") VALUES (\"" 
                                    . implode('","', $values) 
                                    . "\")");
        $stmt->execute();
        return $this->find($this->pdo->lastInsertId());
    }

    public function update(int $id, array $values): array
    {
        $setValues = [];
        foreach ($values as $key => $value) {
            $setValues[] = "$key = :$key";
        }
        $stmt = $this->pdo->prepare("UPDATE {$this->table} SET " . implode(',', $setValues) . " WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        foreach ($values as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        echo $stmt->queryString;
        $stmt->execute();
        return $this->find($id);
    }

    public function find(int $id): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function get(array $filters = []): array
    {
        $query = "SELECT * FROM {$this->table}";
        if (!empty($filters)) {
            $whereClause = [];
            foreach ($filters as $column => $value) {
                $whereClause[] = "$column = :$column";
            }
            $query .= " WHERE " . implode(' AND ', $whereClause);
        }
        $stmt = $this->pdo->prepare($query);
        foreach ($filters as $column => $value) {
            $stmt->bindValue(":$column", $value);
        }
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_DEFAULT);
    }
}

class Shop extends BaseDataClass{
    protected $table = "shop";    
}

class Product extends BaseDataClass{
    protected $table = "product";    
}



