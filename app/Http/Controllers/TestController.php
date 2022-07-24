<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function test1(Request $request)
    {
        var_dump($request->Input('name', 'kitty'));
        echo '<br/>';
        var_dump($request->Input('id'));
        echo '<br/>';
        var_dump($request->all());
        echo '<br/>';
        var_dump($request->only(['name', 'age']));
        echo '<br/>';
        var_dump($request->except(['name', 'age']));
        echo '<br/>';
        var_dump($request->has('name'));
        echo '<br/>';
        var_dump($request->has('id'));
        echo '<br/>';
    }

    //http://localhost:3000/public/user/add?name=gg
    public function add(Request $request)
    {
        $db = DB::table('users');
        //插入多条数据，返回bool
        //写法1
        // $result=$db->insert([
        //     ['name'=>$request->input('name', 'kitty1'),'age'=>1],
        //     ['name'=>$request->input('name2', 'kitty2'),'age'=>2],
        // ]);
        //写法2
        $result = DB::insert('insert into users (name,age) values (?,?),(?,?)', [$request->input('name', 'kitty1'), 1, $request->input('name2', 'kitty2'), 2]);
        echo  $result . '<br/>';
        //插入一条数据，返回其主键
        $newId = $db->insertGetId(['name' => $request->input('name3', 'kitty3')]);
        echo $newId;
    }

    //http://localhost:3000/public/user/del?id=37
    public function del(Request $request)
    {
        $result = DB::delete('delete from users WHERE age = ?', [$request->input('age', 0)]);
        echo  $result . '<br/>';
    }

    //http://localhost:3000/public/user/update?id=36&name=john
    public function update(Request $request)
    {
        $result = DB::update('update users set name = ? where age = ?', [$request->input('name'), $request->input('age')]);
        echo  $result . '<br/>';
    }

    //http://localhost:3000/public/user/get?id=36
    public function get(Request $request)
    {
        $users = DB::select("SELECT * FROM users");
        var_dump($users);
        $user = DB::selectOne("SELECT * FROM users WHERE id = ?", [$request->input('id')]);
        echo '<br/>';
        var_dump($user);
    }

    //http://localhost:3000/public/user/stmt?sql=delete%20from%20users%20where%20id=41
    public function stmt(Request $request)
    {
        echo $request->input('sql') . '<br/>';
        $result = DB::statement($request->input('sql'));
        var_dump($result);
    }
}
