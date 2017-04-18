<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
            @component('header')

            @endcomponent
    </head>
    <body>

    @foreach ($items as $item)
        @component('item', ['item' => $item])
        @endcomponent
    @endforeach
    </body>
</html>
