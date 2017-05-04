@extends('layouts.app')

@section('content')
    @component('layouts.list_action', ['items' => $items,'analyze'=>$analyze])
    @endcomponent
@endsection


@section('script')
    <script type="text/javascript">

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
@endsection
