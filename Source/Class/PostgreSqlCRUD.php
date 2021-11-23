<?php


namespace Source\Class;

class PostgreSqlCRUD extends PostgreSqlConnection
{
    private \PDOStatement | array | null $crud;
    private int $counter;

    private function preparedStatements(string $query, array $params): void{
        $this->countParams($params);
        $this->crud = $this->init()->prepare($query);

        if($this->counter > 0){
            for ($i=1; $i<=$this->counter; $i++){
                $this->crud->bindValue($i, $params[$i-1]);
            }
        }

        if($this->crud->execute() === false)
            $this->crud = $this->crud->errorInfo();

        $this->close();
    }

    private function countParams(array $params): void{
        $this->counter = count($params);
    }

    private function generateTokens($params): string{
        $tokenList = str_repeat("?,", count($params));
        return rtrim($tokenList,',');
    }

    private function formatFields($fields): string{
        return implode(',', $fields);
    }

    public function insertOnDB(string $table, array $fields, array $params): \PDOStatement | false{
        $this->preparedStatements("INSERT INTO {$table} ({$this->formatFields($fields)}) VALUES ({$this->generateTokens($params)})", $params);
        return $this->crud;
    }

    // como acessar os valores: $this->crud->fetchAll(PDO::FETCH_ASSOC);
    public function selectFromDB(array $fields, string $table, string $filter = '', array $params = []): \PDOStatement | false{
        $this->preparedStatements("SELECT {$this->formatFields($fields)} FROM {$table} {$filter}", $params);
        return $this->crud;
    }

    public function updateOnDB(string $table, string $set, string $filter, array $params): \PDOStatement | false{
        $this->preparedStatements("UPDATE {$table} SET {$set} WHERE {$filter}", $params);
        return $this->crud;
    }

    public function deleteFromDB(string $table, string $filter, array $params): \PDOStatement | false{
        $this->preparedStatements("DELETE FROM {$table} WHERE {$filter}", $params);
        return $this->crud;
    }
}