<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\slide;
use App\Models\Medicine;
class customerdash extends Controller
{
    
    public function customerhome()
    {
        $medicines = Medicine::all();

        $pic = slide::all();
        return view('customerdash')->with('pic',$pic)->with('medicines',$medicines);
    }
}
