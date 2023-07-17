<?php

namespace App\Imports;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\test;
use Maatwebsite\Excel\Concerns\ToModel;

class testImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new test([
            "name"=>$row["name"],
            "prenom"=>$row["prenom"],
            "age"=>$row["age"]
        ]);
    }
}
