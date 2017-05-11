<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Model\PostActionModel;
use Illuminate\Http\Request;
use App\Model\Error;

class PostActionController extends Controller
{
    public function list_post_by_action_id(Request $request)
    {
        //
        $action_id = $request->get("action_id");
        if (!$action_id) {
            return Error::error(Error::$ERROR_PARAM_ERROR);
        }
        $posts = PostActionModel::where('action_id',$action_id)->take(30)->get();
        return $posts;
    }

    public function del_post_by_id(Request $request)
    {
        //
        $id = $request->get("id");
        if (!$id) {
            return Error::error(Error::$ERROR_PARAM_ERROR);
        }
    }

    public function add_post_with_action_id(Request $request)
    {
        //
        $action_id = $request->get("action_id");
        if (!$action_id) {
            return Error::error(Error::$ERROR_PARAM_ERROR);
        }
    }
}
