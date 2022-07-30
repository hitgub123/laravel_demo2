<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestViewController extends Controller
{
    public function v1()
    {
        $date = date("Y/m/d H:i:s", time());
        $a1y = strtotime('+1 year');
        $arr1 = [['id' => 1, 'name' => 'n1'], ['id' => 2, 'name' => 'n2'], ['id' => 3, 'name' => 'n3']];
        // return view('test.v1', ['date'=>$date,'a1y'=>$a1y]);
        return view('test.v1', compact('date', 'a1y', 'arr1'));
    }
    public function v2()
    {
        return view('test.v2');
    }
    public function v3()
    {
        return view('test.v3');
    }
    public function v4(Request $request)
    {
        $validate_rule = [
            'name' => 'required|min:2|max:4',
            'age' => 'required|numeric|min:2|max:4',
            'email' => 'required|email',
            'file1' => 'required|file',
            'cap' => 'required|captcha',
        ];
        $validate_msg = [
            'name.required' => '名前を入力してください',
            'age.numeric' => '整数で入力してください',
            'cap.captcha' => '验证码错误',
        ];
        // 参数2（$validate_msg）可以不传
        // $request->validate($validate_rule);
        $request->validate($validate_rule, $validate_msg);

        $fn = 'file1';
        if ($request->hasFile($fn) && $request->file($fn)->isValid()) {
            $fname = md5(time()) . rand(100, 999) . '.' . $request->file($fn)->getClientOriginalExtension();
            echo  $fname;
            //会上传到\public\upload
            // $request->file($fn)->move('./upload', $fname);
            $request->file($fn)->move(getcwd() . '/upload', $fname);
        } else {
            echo $request->file($fn)->getError() . '<br/>';
            echo $request->file($fn)->getErrorMessage() . '<br/>';
        }
        return view('test.v4');
    }

    public function v5()
    {
        $datas = DB::table('users')->paginate(2);
        return view('test.v5', compact('datas'));
    }

    public function v55(Request $request)
    {
        $sql = "select * from users";
        $data = DB::select($sql);
        $datas = $this->arrayPaginator($data, $request);
        return view('test.v5', compact('datas'));
    }

    public function arrayPaginator($array, $request)
    {
        $page = $request->get('page', 1);
        $perPage = 2;
        $offset = ($page * $perPage) - $perPage;
        return new \Illuminate\Pagination\LengthAwarePaginator(
            array_slice(
                $array,
                $offset,
                $perPage,
                true
            ),
            count($array),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );
    }
}
