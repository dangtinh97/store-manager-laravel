<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\StrHelper;
use App\Http\Controllers\Controller;
use App\Http\Responses\ResponseError;
use App\Http\Responses\ResponseSuccess;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function __construct()
    {
    }

    public function login()
    {
//       $id =  StrHelper::counter('contract');
//       dd($id);
//        $admin = Admin::query()->get();
//        dd($admin->first());
//        $create =  Admin::query()->create([
//            'full_name' => 'admin',
//            'email' => 'admin@admin.com',
//            'status' => 'ACTIVE',
//            'dob' => new Carbon('1997/03/12'),
//            'address' => 'BAC NINH',
//            'mobile' => '0372052643',
//            'password' => Hash::make('admin1234'),
//            'type' => Admin::TYPE_SUPPER_ADMIN,
//            'gender' => 'MALE'
//        ]);
//        dd($create);

        return view('auth.login');
    }

    public function attempt(Request $request)
    {

        $login = Auth::attempt($request->only([
            'email','password'
        ]));
        if(!$login) return response()->json((new ResponseError("Tài khoản hoặc mật khẩu không chính xác!"))->toArray()) ;
        return response()->json((new ResponseSuccess())->toArray());
    }

    public function logout()
    {
        if(!is_null(Auth::user())) Auth::logout();
        return Redirect::route('login');
    }
}
