<?php

namespace App\Models\Contracts;

class JsonBaseModel extends BaseModel
{
    private $dbFolder;
    private $tableFilePath;

    public function __construct()
    {
        $this->dbFolder = BASEPATH . "storage/jsondb/";
        $this->tableFilePath = $this->dbFolder . $this->table . ".json";
    }

    private function writeTable(array $data)
    {
        $dataJson = json_encode($data);
        file_put_contents($this->tableFilePath, $dataJson);
    }

    private function readTable()
    {
        return json_decode(file_get_contents($this->tableFilePath));
    }

    public function create(array $data): int
    {
        $tableData = $this->readTable();
        $tableData[] = $data;
        $this->writeTable($tableData);
        echo "Create Succsesfuly";
        return $data['id'];
    }

    public function find($id): object
    {
        $key = $this->primaryKey;
        $tableData = $this->readTable();
        foreach ($tableData as $record) {
            if ($record->$key == $id) {
                return $record;
            }
        }
        return (object) [];
    }

    public function getAll(): array
    {
        return $this->readTable();
    }

    public function get(array $columns, array $whrer): array
    {
        return [];
    }

    public function update(array $data, array $where): int
    {
        return 1;
    }

    public function delete(array $where): int
    {
        return 1;
    }
}

