<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class productImport implements ToModel
{
    public function model(array $row)
    {
        return new Product([
            'name' => $row[1],
            'price' => $row[2],
            'description' => $row[7],
            'category_id' => $row[3],
            'image' => $row[9],
        ]);
    }
}