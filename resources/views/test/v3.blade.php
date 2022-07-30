@extends('mytemplate.parent')
@section('part1')
<form method="post" action="{{ route('v4r') }}"   enctype="multipart/form-data">
    <!--  方式1：laravel 5.6 及以后版本，也是 csrf_field() 的简写 -->
    <!-- @csrf -->
    <!-- 方式2：laravel 5.6 以下老版本  -->
    <!-- {{ csrf_field() }} -->
    <!--  方式3：添加隐藏字段-->
    <input name="_token" type="hidden" value="<?php echo csrf_token();?>">
    <!-- 输出上面的 token 字符串 -->
    {{ csrf_token() }}
    <input type='text' name="id" value='enter name'/>
    <input type='file' name="file1"/>
    <input type='submit' value='Submit'/> 
</form>
@endsection
@section('part2')
<?php 
    echo '<form method="post" action="'.route('v4r').'" enctype="multipart/form-data">';
    echo '<input name="_token" type="hidden" value="'.csrf_token().'">';
    echo '<input type="text" name="id" value="enter name"/>';
    echo '<input type="file" name="file1"/>';
    echo '<input type="submit" value="Submit"/></form>';
?>
@endsection



