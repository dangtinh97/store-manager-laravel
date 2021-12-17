<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Services\Admin\AdminServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    protected $adminService;

    public function __construct(AdminServiceInterface $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index(Request $request)
    {
        $admins = $this->adminService->index();
        return view('admin.list',compact('admins'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(AdminStoreRequest $request)
    {
        $create = $this->adminService->create($request->all());
        return response()->json(($create->toArray()));
    }

    public function show($id){
        return Redirect::route('admins.edit',$id);
    }

    public function edit($id)
    {
        $admin = $this->adminService->show($id);
        if(is_null($admin)) return abort(404);
        return view('admin.edit',compact('admin'));
    }

    public function destroy($id)
    {
        return $this->adminService->destroy($id);
    }

    public function update(AdminUpdateRequest $request,$id)
    {
       $update = $this->adminService->update($id,$request->all());
       return response()->json($update->toArray());
    }
}
