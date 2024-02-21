<?php

namespace App\Imports;

use App\Brand;
use App\Category;
use App\Product;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsImport implements ToModel, WithBatchInserts, WithChunkReading, ShouldQueue, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    protected $rowNo = 0;
    public function model(array $row)
    {
        $this->rowNo++;
        try {
            $this->validateRow($row);
            $data = $this->prepareData($row);
            return new Product($data);
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->messages();
            foreach ($errors as $error) {
                foreach ($error as $value) {
                    $errorMessage = $value;
                }
            }
            Log::error("BULK_UPLOAD_PRODUCT_Validation Error for row number: " . $this->rowNo . ". Error: $errorMessage");
        }
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    private function prepareData($row) {
        $brand = (new Brand())->findBrandByName($row['brand_id']);
        if (!empty($brand)) {
            $data['brand_id'] = $brand->id;
        }
        $category = (new Category())->findCategoryByName($row['category_id']);
        if (!empty($category)) {
            $data['category_id'] = $category->id;
        }
        $data['name'] = $row['name'];
        $data['slug'] = Str::slug($data['name']);
        $data['description'] = $row['description'];
        $data['regular_price'] = $row['regular_price'];
        $data['discount_price'] = $row['discount_price'] ?? null;
        $data['stock'] = $row['stock'];
        $data['availability'] = $row['availability'];
        $data['status'] = $row['status'];
        return $data;
    }

    private function validateRow($row)
    {
        $validator = Validator::make($row, [
            'brand_id' => 'required|string',
            'category_id' => 'required|string',
            'name' => 'required|string',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'discoutn_price' => 'sometimes|nullable|numeric',
            'stock' => 'required|integer',
            'availability' => 'required',
            'status' => 'required'
        ]
    );

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
