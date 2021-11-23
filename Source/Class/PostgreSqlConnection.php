<?php

namespace Source\Class;

use PDO;

abstract class PostgreSqlConnection
{
    private string $hostname = "ec2-34-205-230-1.compute-1.amazonaws.com";
    private int $port = 5432;
    private string $username = 'lpzjlnwpcisvjj';
    private string $password = 'b2dee18b5a690fc28ceb963e54f46f4a0273c5b1263911ea34cb469935ade41a';
    private string $database = 'd3cms7cndvvtd5';
    private PDO | null $conn;

    protected function init(): PDO | string
    {
        try {
            $this->conn = new PDO("pgsql:host={$this->hostname};port={$this->port};dbname={$this->database}",$this->username,$this->password);
            return $this->conn;
        }catch (\PDOException $error){
            return $error->getMessage();
        }
    }

    protected function close(): void{
        $this->conn = null;
    }
}