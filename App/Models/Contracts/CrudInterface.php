<?php

namespace App\Models\Contracts;


interface CrudInterface
{

    // Create (insert)
    public function create(array $data);


    // Read (select) single | multiple
    public function find($id): object;
    public function get(array $columns, array $whrer): array;


    // Update 
    public function update(array $data, array $where): int;


    // Delete
    public function delete(array $where): int;


}
