<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::all();
    }
    public function headings(): array {
        return [
            'ID',
            'Name',
            'Price',    
            "Created",
            "Updated"
            
        ];
    }
 
    public function map($user): array {
        return [
            $user->id,
            $user->name,
            $user->price,
            $user->created_at,
            $user->updated_at
        ];
    }
}
