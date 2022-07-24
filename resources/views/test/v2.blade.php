@extends('mytemplate.parent')
@section('part1')
<div>666</div>
@endsection
@section('part2')
<div>777</div>
@endsection

<?php
$date = date("Y/m/d H:i:s", time());
$a1y = strtotime('+1 year');
$arr1 = [['id' => 1, 'name' => 'n1'], ['id' => 2, 'name' => 'n2'], ['id' => 3, 'name' => 'n3']];
?>
@include('test.v1')

