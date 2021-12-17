<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Services\User\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $list = $this->userService->list();
        return view('user.list',compact('list'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(UserStoreRequest $request)
    {
        $create = $this->userService->create($request->all());
        return response()->json($create->toArray());
    }

    public function edit($id)
    {
        $user = $this->userService->show($id);
        if(is_null($user)) return abort(404);
        return view("user.edit",compact('user'));
    }

    public function update(UserUpdateRequest $request,$id)
    {
       $update = $this->userService->update($id,$request->all());
       return response()->json($update->toArray());
    }

    public function destroy($id)
    {
        $user = $this->userService->show($id);
        if(is_null($user)) return abort(404);
        if(count($user->contract)>0) return Redirect::back()->withErrors("Khách hàng hiện đang có ".count($user->contract)." hợp đồng, không thể xoá khách hàng.");
        $user->delete();
        return Redirect::route('users.index');
    }

    public function show($id)
    {
        $user = $this->userService->show($id);
        if(is_null($user)) return abort(404);
        return view("user.show",compact('user'));
    }

}
