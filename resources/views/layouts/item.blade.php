<div class="col-lg-3">
    <a href="//dbditem.jd.com/{{$item->id}}" target="_blank">
        <div class="center-block" id="image">
            <img class="center-block" width="180" height="180" src="{{$item->image}}">
        </div>


        <div id="deal_price" style="float:left; padding-right: 20px;">
            <h5>
                <nobr>成交价：{{$item->deal_price}}</nobr>
            </h5>
        </div>
        <div id="jd_price">
            <h6>
                <nobr>京东价：{{$item->jd_price}}</nobr>
            </h6>
        </div>
        <div>
            <h6>
                <nobr>买主：{{$item->deal_user}}</nobr>
            </h6>
        </div>
        <div id="name">
            <h5>{{$item->item_abs}}</h5>
        </div>
    </a>
</div>