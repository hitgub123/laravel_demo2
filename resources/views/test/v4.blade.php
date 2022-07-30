@extends('mytemplate.parent')
@section('part1')
<?php
 var_dump($_REQUEST);
 echo '<br/>';
 var_dump($_FILES);
?>  
@endsection
@section('part2')
{{var_dump($_REQUEST)}}
{{ var_dump($_FILES)}}
<div>777</div>
@endsection


