<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MultiSheetWithFormulasImporter implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'user_data_1' => new FirstSheetNoFormulaImporter(),
            'user_data_2' => new SecondSheetWithFormulaImporter(),
        ];
    }
}
