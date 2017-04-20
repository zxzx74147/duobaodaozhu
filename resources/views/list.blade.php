<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
            @component('header')

            @endcomponent

    </head>
    <body>

    <div id="items" data-items="{{$items}}" ></div>
    <canvas id="tendChart"  width="1200" height="800" ></canvas>


    @foreach ($items as $item)
        @component('item', ['item' => $item])
        @endcomponent
    @endforeach

    <script>

        $(document).ready(function(){
            var items  = $('#items').data("items");
            var dealPrice=[];
            var labels = [];
            var i=0;
            items.forEach(function (item) {
                dealPrice.push(item.deal_price);
                labels.push(i++);
            });
            dealPrice.reverse();
            labels.reverse();

            var data = {
                labels : labels,
                datasets : [
                    {
                        fillColor : "rgba(220,220,220,0.5)",
                        strokeColor : "rgba(220,220,220,1)",
                        pointColor : "rgba(220,220,220,1)",
                        pointStrokeColor : "#fff",
                        data : dealPrice,
                    }
                ]
            }

            var ctx = new Chart(document.getElementById("tendChart").getContext("2d"),{
                type: "line",
                data: data,
            });
            console.info(labels)
        });

    </script>
    </body>
</html>
