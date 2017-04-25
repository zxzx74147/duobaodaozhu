<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @component('head')

    @endcomponent

    <style>
        body{
            width: 1050px;
        }
        #feed {
            width: 1050px;
            height: auto;
            margin: 0px auto;

        }
        #pic {
            height: 250px;
        }
        #pic img {
            margin:  auto;
            display: block;
            text-align: center;
        }
        #name{
            font-size:12px;
        }

    </style>
</head>
<body>
<div class="container">

    <div id="feed" class="container-fluid">
        @foreach ($items as $item)
            @if ($loop->index%4==0)
                <div class="row">
                    @endif

                    @component('item', ['item' => $item])
                    @endcomponent

                    @if ($loop->index%4==3)
                </div>
            @endif
        @endforeach
        {{--@for ($i = 0; $i < 10; $i++)--}}
        {{--<div class="row">--}}
        {{--@for ($j = 0; $j < 5; $i++)--}}

        {{--@if ($i*5+$j >= count($items))--}}
        {{--@break--}}
        {{--@endif--}}

        {{--@component('item', ['item' => $items[$i*5+$j]])--}}
        {{--@endcomponent--}}
        {{--@endfor--}}
        {{--</div>--}}
        {{--@endfor--}}
    </div>


</div>
</body>
</html>
