<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $projectModel= Project::query();
        $projectModel->find(1)->update([
            'name_project' => "KP: Dự án quản lý chung cư"
        ]);
        dd("done");
    }
}
