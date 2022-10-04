<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithConditionalSheets;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MultiSheetSelectSpecificSheet implements WithMultipleSheets
{
    use WithConditionalSheets;

    public function conditionalSheets(): array
    {
        return [
            'user_data_1' => new FirstSheetImporter,
            'user_data_2' => new SecondSheetImporter,
            'user_data_3' => new ThirdSheetImporter,
        ];
    }
}
