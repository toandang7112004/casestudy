<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;

class CategoryExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Category::all();
    }
    public function headings(): array {
        return [
            'ID',
            'Name',
            "Created",
            "Updated"
            
        ];
    }
 
    public function map($category): array {
        return [
            $category->id,
            $category->name,
            $category->created_at,
            $category->updated_at
        ];
    }
}
