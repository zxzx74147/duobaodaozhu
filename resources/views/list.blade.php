<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
            @component('header')

            @endcomponent

    </head>
    <body>

    <canvas id="tendChart" width="640" height="360"></canvas>

    @foreach ($items as $item)
        @component('item', ['item' => $item])
        @endcomponent
    @endforeach

    <script>
        var item=$items;
    </script>
    </body>
</html>
