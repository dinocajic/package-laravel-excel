<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class BatchImport implements ToModel, WithHeadingRow, WithBatchInserts, WithUpserts
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new User([
            'name'     => $row['first_name'] . " " . $row['last_name'],
            'email'    => $row['email'],
            'password' => Hash::make($row['password']),
        ]);
    }

    public function batchSize(): int
    {
        return 100;
    }

    public function uniqueBy(): string
    {
        return 'email';
    }
}
