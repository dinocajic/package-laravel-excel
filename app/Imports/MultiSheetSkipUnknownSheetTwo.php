<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MultiSheetSkipUnknownSheetTwo implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'user_data_1' => new FirstSheetImporter,
            'user_data_2' => new SecondSheetImporter,
            'user_data_3' => new ThirdSheetImporter,
        ];
    }

}
