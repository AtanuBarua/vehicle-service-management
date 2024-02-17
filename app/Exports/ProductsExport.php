<?php

namespace App\Exports;

use App\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\Exportable;

class ProductsExport implements ShouldQueue, WithMapping, FromQuery, WithHeadings, WithStyles
{
    use Queueable, Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */

    public function query()
    {
        return Product::query()->with('brand:id,name','category:id,name');
    }

    public function map($product): array {
        return [
            $product->brand->name,
            $product->category->name,
            $product->name,
            $product->regular_price,
            $product->discount_price,
            $product->stock,
            $product->sold,
            Product::availabilityMapping()[$product->availability] ?? '',
            Product::statusMapping()[$product->status] ?? '',
        ];
    }

    public function headings(): array {
        return [
            'Brand',
            'Category',
            'Product',
            'Regular Price',
            'Discount Price',
            'Stock',
            'Sold',
            'Availability',
            'Status',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]]
        ];
    }
}
