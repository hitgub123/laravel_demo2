<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestViewController extends Controller
{
    public function v1(){
        $date=date("Y/m/d H:i:s", time());
        $a1y=strtotime('+1 year');
        $arr1=[['id'=>1,'name'=>'n1'],['id'=>2,'name'=>'n2'],['id'=>3,'name'=>'n3']];
        // return view('test.v1', ['date'=>$date,'a1y'=>$a1y]);
        return view('test.v1', compact('date','a1y','arr1'));
    }
    public function v2(){
        return view('test.v2');
    }
}
