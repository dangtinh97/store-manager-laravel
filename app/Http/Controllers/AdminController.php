<?php

namespace App\Http\Controllers;

use App\Services\Admin\AdminServiceInterface;
use Illuminate\Http\Request;

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
}
