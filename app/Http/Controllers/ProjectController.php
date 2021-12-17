<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Services\Project\ProjectServiceInterface;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $projectService;
    public function __construct(ProjectServiceInterface $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index()
    {
        $list = $this->projectService->list();
        return view('project.list',compact('list'));
    }

    public function create()
    {
        return view('project.create');
    }

    public function store(ProjectStoreRequest $request)
    {
        $createProject = $this->projectService->create($request->all());
        return response()->json($createProject->toArray());
    }

    public function show($id)
    {
        $project = $this->projectService->show($id);
        $contract = $project->contract();

        return view('project.show',compact('project','contract'));
    }

    public function edit($id)
    {
        $project = $this->projectService->show($id);
        return view('project.edit',compact('project'));
    }

    public function update(ProjectStoreRequest $request,$id)
    {
       $update = $this->projectService->update($id,$request->all());
       return response()->json($update->toArray());
    }
}
