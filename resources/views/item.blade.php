
<h3>{{ $item->item_abs }}</h3>
<p>京东原价:{{ $item->jd_price }}</p>
<a herf="https://item.jd.com/{{ $item->jd_item_id }}.html">
<p>京东链接:https://item.jd.com/{{ $item->jd_item_id }}.html</p></a>
<p>成交价格:{{ $item->deal_price }}</p>
<p>成交用户:{{ $item->deal_user }}</p>
<p>成交时间:{{ $item->time }}</p>