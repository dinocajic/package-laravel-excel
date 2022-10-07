<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\RemembersChunkOffset;
use Maatwebsite\Excel\Concerns\RemembersRowNumber;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ChunkImport implements ToModel, WithHeadingRow, WithChunkReading, WithBatchInserts
{

    use RemembersRowNumber, RemembersChunkOffset;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        var_dump("Row: " . $this->getRowNumber() . " -- Chunk: " . $this->getChunkOffset());

        return new User([
            'name'     => $row['first_name'] . " " . $row['last_name'],
            'email'    => $row['email'],
            'password' => Hash::make($row['password']),
        ]);
    }

    public function chunkSize(): int
    {
        return 20;
    }

    public function batchSize(): int
    {
        return 20;
    }
}
