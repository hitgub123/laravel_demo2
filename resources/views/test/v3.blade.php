@extends('mytemplate.parent')
@section('part1')
@if(count($errors)>0)
@foreach($errors->all() as $e)
{{ $e }}<br/>
@endforeach
@endif

<form method="post" action="{{ route('v4r') }}" enctype="multipart/form-data">
    <!--  方式1：laravel 5.6 及以后版本，也是 csrf_field() 的简写 -->
    <!-- @csrf -->
    <!-- 方式2：laravel 5.6 以下老版本  -->
    <!-- {{ csrf_field() }} -->
    <!--  方式3：添加隐藏字段-->
    <input name="_token" type="hidden" value="<?php echo csrf_token(); ?>">
    <!-- 输出上面的 token 字符串 -->
    {{ csrf_token() }}<br />
    name:<input type='text' name="name" value='111' /><br />
    age:<input type='text' name="age" value='3' /><br />
    email:<input type='text' name="email" value='2@2' /><br />
    file:<input type='file' name="file1" /><br />
    capture:<input type='text' name="cap" /><br />
    <img src="{{captcha_src()}}" style="cursor: pointer" onclick="this.src='{{captcha_src()}}'+Math.random()">
    <input type='submit' value='Submit' />
</form>
@endsection
@section('part2')
<?php
echo '<form method="post" action="' . route('v4r') . '" enctype="multipart/form-data">';
echo '<input name="_token" type="hidden" value="' . csrf_token() . '">';
echo '<input type="text" name="id" value="enter name"/>';
echo '<input type="file" name="file1"/>';
echo '<input type="submit" value="Submit"/></form>';
?>
@endsection