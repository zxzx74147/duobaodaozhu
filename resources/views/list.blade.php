<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @component('header')

    @endcomponent

    <style>
        #feed {
            width: 1050px;
            height: auto;
            margin: 0px auto;
        }

        #preview {
            width: 358px;
            height: auto;
            float: left;
            display: inline;
        }

        #intro_detail {
            width: 650px;
            display: inline;
            float: right;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div id="items" data-items="{{$items}}"></div>

    <div id="feed">
        <div>
            <div id="preview"><img width="348" height="348" src="{{$items[0]->image}}"></div>
            <div id="intro_detail"><h1>{{$items[0]->item_abs}}</h1></div>
        </div>

        <table class="table table-striped">
            <tr>
                <th>成交时间</th>
                <th>成交价格</th>
                <th>成交用户</th>
                <th>夺宝链接</th>
                <th>商品状态</th>
            </tr>
            @foreach ($items as $item)
                @component('item', ['item' => $item])
                @endcomponent
            @endforeach
        </table>

        <canvas id="tendChart" width="1200" height="800"></canvas>
    </div>
    <script>

        $(document).ready(function () {
            var items = $('#items').data("items");
            var dealPrice = [];
            var labels = [];
            var i = 0;
            items.forEach(function (item) {
                dealPrice.push(item.deal_price);
                labels.push(i++);
            });
            dealPrice.reverse();
            labels.reverse();

            var data = {
                labels: labels,
                datasets: [
                    {
                        fillColor: "rgba(220,220,220,0.5)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        data: dealPrice
                    }
                ]
            };

            var ctx = new Chart(document.getElementById("tendChart").getContext("2d"), {
                type: "line",
                data: data
            });
            console.info(labels)
        });

    </script>
</div>
</body>
</html>
