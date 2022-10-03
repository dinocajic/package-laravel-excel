<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MultiSheetSpecificSelectorByIndex implements WithMultipleSheets
{

    public function sheets(): array
    {
        return [
            0 => new FirstSheetImporter,
            2 => new SecondSheetImporter,
        ];
    }
}
