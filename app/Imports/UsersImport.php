<?php

namespace App\Imports;

use App\Models\test;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Services\PayUService\Exception;


class UsersImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */

    public function collection(Collection $collection)
    {
//        $newData = $collection->toArray();
//        ///dd($newData );
//        $oldData = test::all()->keyBy("name")->toArray();
//        $verifyed = array();
//        foreach ($newData as $record){
//            if(!array_key_exists($record["name"],$oldData)){
//                $verifyed=array_merge($record,$verifyed);
//            }
//        }


        $newData = $collection->toArray();
        $oldData = test::all()->toArray();
        $diff = array_udiff($newData, $oldData,
            function ($obj_a, $obj_b) {
                return strcmp($obj_a["name"], $obj_b["name"]);
            }
        );
        if(count($diff)==0) {
            throw new \ErrorException('all record exist !');
        }
        dd($diff);
        if(test::insert($diff)){
            throw new \ErrorException(count($diff) ." new record added");;
        }else{
            throw new \ErrorException("Error: insertion failed");;

        }
    }
}
