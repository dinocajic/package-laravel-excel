<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ThirdSheetImporter implements ToModel, WithHeadingRow, SkipsUnknownSheets
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name'     => $row['name_first'] . " " . $row['name_last'],
            'email'    => $row['email_address'],
            'password' => Hash::make($row['pass']),
        ]);
    }

    public function onUnknownSheet($sheetName)
    {
        Log::error("Sheet " . $sheetName . " was skipped from import.");
    }
}
