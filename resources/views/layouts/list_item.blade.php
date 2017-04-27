@component('head')

@endcomponent

<style type="text/css">
    body {
        width: 1050px;
    }

    #feed {
        width: 1050px;
        height: auto;
        margin: 0 auto;

    }

    #pic {
        height: 250px;
    }

    #pic img {
        margin: auto;
        display: block;
        text-align: center;
    }

    #name {
        font-size: 12px;
    }

</style>
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
    </div>


</div>
