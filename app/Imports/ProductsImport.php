<?php

namespace App\Imports;

use App\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductsImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Product::create([
                'sku' => $row[0],
                'quantity' => $row[2],
                'unit_price' => $row[3],
            ]);
        }
    }
}
