<?php

namespace App\Http\Controllers;

use App\Model\Item;
use App\Model\ItemJD;
use App\Model\Error;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    public function list_jdid_json(Request $request)
    {
        //
        $jd_id = $request->get("jd_id");
        if (!$jd_id) {
            return Error::error(Error::$ERROR_PARAM_ERROR);
        }

        $page_value = $request->get("page_value");
        $items = Item::where('jd_item_id', $jd_id)->orderBy('id', 'desc')->take(30)->get();
        $item_jd = ItemJD::where('id', $jd_id)->get();
        foreach ($items as $item) {
            $item->time = gmdate("Y-m-d H:i:s", $item->time);
            if($item_jd){
                $item->image=$item_jd[0]->image;
            }
        }

        return $items;
    }

    public function list_jdid_html(Request $request)
    {
        $items = list_jdid_json($request);
        return $items;
    }

}
