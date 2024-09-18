<?php

namespace App\Models\Contracts;

use PDOException;
use Medoo\Medoo;


class MySQLBaseModel extends BaseModel
{

    public function __construct($id = null)
    {
        try {
            $this->db = new Medoo([
                // [required]
                'type' => 'mysql',
                'host' => $_ENV['DB_HOST'],
                'database' => $_ENV['DB_NAME'],
                'username' => $_ENV['DB_USER'],
                'password' => $_ENV['DB_PASSWORD'],

                // [optional]
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_general_ci',
                'port' => 3306,

                // [optional] The table prefix. All table names will be prefixed as PREFIX_table.
                'prefix' => '',

                // [optional] To enable logging. It is disabled by default for better performance.
                'logging' => true,

                // [optional]
                // Error mode
                // Error handling strategies when the error has occurred.
                // PDO::ERRMODE_SILENT (default) | PDO::ERRMODE_WARNING | PDO::ERRMODE_EXCEPTION
                // Read more from https://www.php.net/manual/en/pdo.error-handling.php.
                'error' => \PDO::ERRMODE_EXCEPTION,


                // [optional] Medoo will execute those commands after the database is connected.
                'command' => [
                    'SET SQL_MODE=ANSI_QUOTES'
                ]
            ]);

        } catch (PDOException $e) {
            echo "cannection faild ..." . $e->getMessage();
        }

        if (!is_null($id)) {
            return $this->find($id);
        }
    }


    public function remove()
    {
        $record = $this->{$this->primaryKey};
        return $this->delete([$this->primaryKey => $record]);

    }

    public function save()
    {
        $record = $this->{$this->primaryKey};
        $this->update($this->attributes, [$this->primaryKey => $record]);
        return $this;
    }


    // Create (insert)

    public function create(array $data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->id();
    }


    // Read (select) single | multiple | All

    public function find($id): object
    {
        $columns = '*';
        $where = [$this->primaryKey => $id];
        $record = $this->db->get($this->table, $columns, $where);
        if (is_null($record)) {
            return (object) null;
        }
        foreach ($record as $col => $val) {
            $this->attributes[$col] = $val;
        }
        // return (object) $record;
        return $this;
    }

    public function getAll(): array
    {
        $columns = '*';
        return $this->db->select($this->table, $columns);
    }
    public function get(array $columns, array $where): array
    {
        $result = $this->db->select($this->table, $columns, $where);
        return $result;
    }

    // Update 

    public function update(array $data, array $where): int
    {
        $result = $this->db->update($this->table, $data, $where);
        return $result->rowCount();
    }

    // Delete

    public function delete(array $where): int
    {
        $result = $this->db->delete($this->table, $where);
        return $result->rowCount();

    }
}