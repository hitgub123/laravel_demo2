<script type="text/javascript" src="{{asset('css')}}/app.css"></script>
<script type="text/javascript" src="{{asset('js')}}/bootstrap.js"></script>
<script type="text/javascript" src="{{asset('js')}}/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset('js')}}/app.js" />
<br />现在时间：{{$date}}
<br />一年后时间：{{date('Y-m-d H:i:s',$a1y)}}
<br />
@foreach($arr1 as $user)
{{$user['id']}}---{{$user['name']}}<br />
@endforeach

@for ($i = 0; $i
< 11; $i++) <br />
@if($i%2==0)
{{$i}} can divide by 2
@elseif($i%3==0)
{{$i}} can divide by 3
@else
{{$i}} cannot divide by
@endif
@endfor

<button type="button" id='b'>ajax1</button>
<div id='d'></div>
<script>
    $('#b').click(function(event) {
        $.ajax({
            url: "{{route('v6r')}}",
            async: true,
            success: function(result) {
                console.log(result);
                let str = '';
                var i = 0; //インデックス用
                $.each(result, function(key, item) {
                    //クラスセレクタのインデックスを明示してあげないと、同じ場所を何度も上書きしてしまうことになる。
                    str = str + item['id'] + ':' + item['name'] + '<br/>';
                    i++; //インデックス用のインクリメント
                })
                $("#d").html(str);
            }
        });
    });
</script>