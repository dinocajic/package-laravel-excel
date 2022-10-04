<?php

namespace App\Imports;

use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MultiSheetSkipUnknownSheet implements WithMultipleSheets, SkipsUnknownSheets
{
    public function sheets(): array
    {
        return [
            'user_data_1' => new FirstSheetImporter,
            'user_data_2' => new SecondSheetImporter,
            'user_data_3' => new SecondSheetImporter,
        ];
    }

    public function onUnknownSheet($sheetName)
    {
        Log::error("Sheet " . $sheetName . " was skipped from import.");
    }
}
