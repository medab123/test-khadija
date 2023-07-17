<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use App\Models\test;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Services\PayUService\Exception;


class TestController extends Controller
{
    public function index()
    {
        $tests = test::all();

        return view("welcome", ["tests" => $tests]);
    }

    public function import(Request $request)
    {
        try {
            $test = null;
            Excel::import($test = new UsersImport, $request->file('xlsx')->store('temp'));
        }catch (\Exception $e){
            return redirect('/')->with("success",$e->getMessage());

        }
    }
}
