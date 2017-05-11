<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Model\Post\PostJDModel;
use Illuminate\Http\Request;
use App\Model\Error;
use Illuminate\Support\Facades\Auth;

class PostJDController extends Controller
{
    public function list_post_by_jd_id(Request $request)
    {
        //
        $action_id = $request->get("jd_id");
        if (!$action_id) {
            return Error::error(Error::$ERROR_PARAM_ERROR);
        }
        $posts = PostJDModel::where('jd_id',$action_id)->take(30)->get();
        return $posts;
    }

    public function del_post_by_id(Request $request)
    {
        //
        $id = $request->get("id");
        if (!$id) {
            return Error::error(Error::$ERROR_PARAM_ERROR);
        }
        PostJDModel::destroy([$id]);
    }

    public function add_post_with_action_id(Request $request)
    {
        //
//        $request->session()->
        $jd_id = $request->get("jd_id");
        if (!$jd_id) {
            return Error::error(Error::$ERROR_PARAM_ERROR);
        }
        $id = Auth::user()->id;
        $content = $request->get("content");
        $post = new PostJDModel();
        $post->content = $content;
        $post->user_id=$id;
        $post->jd_id=$jd_id;
        $post->save();
//        $post->user_id = $content;
    }
}
