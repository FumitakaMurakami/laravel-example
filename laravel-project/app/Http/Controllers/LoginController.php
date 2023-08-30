<?php

namespace App\Http\Controllers;

use App\Models\Timeline;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {
        Log::info('START - LoginController::index(Request $request)');



        Log::info('END - LoginController::index');

        return view('login');
    }

    public function login(Request $request)
    {
        Log::info('START - LoginController::login(Request $request)');

        // ログインIDを取得
        $loginId = $request->loginId;
        // パスワードを取得
        $password = $request->password;


        Log::info('END - LoginController::login');

        return view('login');
    }
}