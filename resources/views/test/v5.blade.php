<link rel="stylesheet" type="text/css" href="{{asset('css')}}/app.css" />
<script type="text/javascript" src="{{asset('js')}}/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('js')}}/bootstrap.min.js"></script>

@extends('mytemplate.parent')
@section('part1')
<table class="table">
    <tr>
        <td>id</td>
        <td>name</td>
        <td>age</td>
    </tr>
    @foreach($datas as $d)
    <tr>
        <td>{{$d->id}}</td>
        <td>{{$d->name}}</td>
        <td>{{$d->age}}</td>
    </tr>
    @endforeach
</table>

 {{ $datas->withQueryString()->links('pagination::bootstrap-4') }}
 {{ $datas->links() }} 
@endsection
@section('part2')
当前页数据条数：{{$datas->count()}}<br/>
当前页码：{{$datas->currentPage()}}<br/>
当前页第一条数据的序号：{{$datas->firstItem()}}（这个是指在数据总条数里的序号）<br/>
当前页最后一条数据的序号：{{$datas->lastItem()}}<br/>
是否有下一页：{{$datas->hasMorePages()}}<br/>
最后一页序号：{{$datas->lastPage()}}<br/>
上一页的url：{{$datas->previousPageUrl()}}<br/>
下一页的url：{{$datas->nextPageUrl()}}<br/>
指定页的url：{{$datas->url(5)}}<br/>
每一页显示数据条数：{{$datas->perPage()}}<br/>
数据总条数：{{$datas->total()}}<br/>

<?php var_dump($datas);?>
@endsection