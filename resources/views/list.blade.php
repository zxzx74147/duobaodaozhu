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
        var data = {
            labels : ["January","February","March","April","May","June","July"],
            datasets : [
                {
                    fillColor : "rgba(220,220,220,0.5)",
                    strokeColor : "rgba(220,220,220,1)",
                    pointColor : "rgba(220,220,220,1)",
                    pointStrokeColor : "#fff",
                    data : [65,59,90,81,56,55,40]
                },
                {
                    fillColor : "rgba(151,187,205,0.5)",
                    strokeColor : "rgba(151,187,205,1)",
                    pointColor : "rgba(151,187,205,1)",
                    pointStrokeColor : "#fff",
                    data : [28,48,40,19,96,27,100]
                }
            ]
        }

        var ctx = $("#tendChart").get(0).getContext("2d");
        //This will get the first returned node in the jQuery collection.
        var myNewChart = new Chart(ctx);
        myNewChart.PolarArea(data,options);
    </script>
    </body>
</html>
