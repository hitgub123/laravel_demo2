<script type="text/javascript" src="{{asset('js')}}/app.js"></script>
<script type="text/javascript" src="{{asset('js')}}/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset('js')}}/app.js"/>
<br />现在时间：{{$date}}
<br />一年后时间：{{date('Y-m-d H:i:s',$a1y)}}
<br />
@foreach($arr1 as $user)
    {{$user['id']}}---{{$user['name']}}<br />
@endforeach

@for ($i = 0; $i< 11; $i++) <br />
    @if($i%2==0)
        {{$i}} can divide by 2
    @elseif($i%3==0)
        {{$i}} can divide by 3
    @else
        {{$i}} cannot divide by
    @endif
@endfor