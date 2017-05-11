<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Model\Item;
use Illuminate\Http\Request;
use App\Model\Error;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        $key = $request->get('key');
        if (!$key) {
            return Error::$ERROR_PARAM_ERROR;
        }
        $items=Item::where('item_abs','like','%'.$key.'%')->orderBy('id','desc')->take(30)->get();
        ItemController::convertItems($items);
        return $items;
    }
}
