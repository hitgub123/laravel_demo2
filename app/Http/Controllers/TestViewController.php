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
    public function v3(){
        return view('test.v3');
    }
    public function v4(Request $request){
        $fn = 'file1';
        if($request->hasFile($fn) && $request->file($fn)->isValid()) {
            $fname=md5(time()).rand(100,999).'.'.$request->file($fn)->getClientOriginalExtension();
            echo  $fname;
            //会上传到\public\upload
            // $request->file($fn)->move('./upload', $fname);
            $request->file($fn)->move(getcwd().'/upload', $fname);
        }else{
            echo $request->file($fn)->getError().'<br/>';
            echo $request->file($fn)->getErrorMessage().'<br/>';
        }
        return view('test.v4');
    }
}
