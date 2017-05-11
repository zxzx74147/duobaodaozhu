<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Model\Error;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Profile Controller
    |--------------------------------------------------------------------------
    |
    |
    */

    public function profile(Request $request)
    {
        $uid = $request->get('uid');
        if (!$uid) {
            $uid = Auth::user()->id;
        }
        $user = User::find($uid);
        if (!$user) {
            return Error::error(Error::$ERROR_NOT_FOUND);
        }
        return $user;
    }

    public function update(Request $request)
    {
        if (Auth::guest()) {
            return Error::error(Error::$ERROR_AUTH_ERROR);
        }
        $uid = Auth::user()->id;


    }


    public function del(Request $request)
    {
        if (Auth::guest()) {
            return Error::error(Error::$ERROR_AUTH_ERROR);
        }
        $uid = Auth::user()->id;
        $user = User::find($uid);
        if (!$user) {
            return Error::$ERROR_NOT_FOUND;
        }
        $user->delete();
        return Error::$ERROR_OK;
    }
}
