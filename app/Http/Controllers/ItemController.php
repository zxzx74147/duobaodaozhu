<?php

namespace App\Http\Controllers;

use App\Model\Error;
use App\Model\Item;
use App\Model\ItemJD;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    private static $PAGE_NUM = 30;
    private static $time_zone = +8;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public static function convertItems($items){
        foreach ($items as $item) {
            $item->time = gmdate("Y-m-d H:i:s", $item->time+3600*ItemController::$time_zone);
            if ($item->item_jd) {
                $item->image = $item->item_jd->image;
            }
        }
    }

    public function index()
    {
        //
        $items = Item::where('status', '2')->take(10)->get();
        return $items;
    }

    public function list_jdid_num(Request $request)
    {
        //
        $jd_id = $request->get("jd_id");
        if (!$jd_id) {
            return Error::error(Error::$ERROR_PARAM_ERROR);
        }
        $num = Item::where('jd_item_id', $jd_id)->count();
        return $num;
    }


    public function list_latest(Request $request)
    {
        $page_number = $request->get("page_number");
        if (!$page_number || $page_number > 100) {
            $page_number = 100;
        }
        $page_value = $request->get("page_value");
        if (!$page_value || $page_value > 100) {
            $page_value = ItemController::$PAGE_NUM;
        }
        $items = Item::orderBy('time', 'desc')->offset($page_number)->take($page_value)->get();
        ItemController::convertItems($items);
        return $items;
    }


    public function list_jdid_json(Request $request)
    {
        //
        $jd_id = $request->get("jd_id");
        if (!$jd_id) {
            return Error::error(Error::$ERROR_PARAM_ERROR);
        }

        $page_value = $request->get("page_value");
        if (!$page_value || $page_value > 100) {
            $page_value = ItemController::$PAGE_NUM;
        }
        $items = Item::where('jd_item_id', $jd_id)->orderBy('id', 'desc')->take($page_value)->get();
        ItemController::convertItems($items);
        return $items;
    }

    public function list_jdid_analyze(Request $request)
    {

        $jd_id = $request->get("jd_id");
        if (!$jd_id) {
            return Error::error(Error::$ERROR_PARAM_ERROR);
        }
        $page_value = $request->get("page_value");
        if (!$page_value || $page_value > 100) {
            $page_value = ItemController::$PAGE_NUM;
        }
        $count_all = Item::where('jd_item_id', $jd_id)->count();
        $min = Item::where('jd_item_id', $jd_id)->min('deal_price');
        $max = Item::where('jd_item_id', $jd_id)->max('deal_price');
        $avg = Item::where('jd_item_id', $jd_id)->avg('deal_price');

        $items_30_time = Item::where('jd_item_id', $jd_id)->orderBy('id', 'desc')->take($page_value)->get();
        $count_30_time = count($items_30_time);
        $min_30_time = 0;
        $max_30_time = 0;
        $avg_30_time = 0;
        foreach ($items_30_time as $item) {
            if ($min_30_time == 0) {
                $min_30_time = $item->deal_price;
            }
            $min_30_time = min($min_30_time, $item->deal_price);
            $max_30_time = max($max_30_time, $item->deal_price);
            $avg_30_time = $avg_30_time + $item->deal_price;
        }
        if ($count_30_time > 0) {
            $avg_30_time = $avg_30_time / $count_30_time;
        }


        $diff_time = 86400 * 30;
        $now = time();
        $min_30_day = Item::where('jd_item_id', $jd_id)->where('time', '>', $now - $diff_time)->orderBy('id', 'desc')->min('deal_price');
        $max_30_day = Item::where('jd_item_id', $jd_id)->where('time', '>', $now - $diff_time)->orderBy('id', 'desc')->max('deal_price');
        $avg_30_day = Item::where('jd_item_id', $jd_id)->where('time', '>', $now - $diff_time)->orderBy('id', 'desc')->avg('deal_price');
        $count_30_day = Item::where('jd_item_id', $jd_id)->where('time', '>', $now - $diff_time)->count();

        $ret = array(
            'count' => $count_all,
            'min' => $min,
            'max' => $max,
            'avg' => number_format($avg,2),

            'count_30_time' => $count_30_time,
            'min_30_time' => $min_30_time,
            'max_30_time' => $max_30_time,
            'avg_30_time' => number_format($avg_30_time,2),

            'count_30_day' => $count_30_day,
            'min_30_day' => $min_30_day,
            'max_30_day' => $max_30_day,
            'avg_30_day' => number_format($avg_30_day,2),

        );
        return $ret;
    }

    public function list_jdid_html(Request $request)
    {
        $items = list_jdid_json($request);
        return $items;
    }

}
