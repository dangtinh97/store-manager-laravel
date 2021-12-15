<?php

namespace App\Services\Project;

use App\Http\Responses\ApiResponse;
use App\Http\Responses\ResponseSuccess;
use App\Models\Project;
use App\Repositories\Project\ProjectRepository;
use Illuminate\Support\Facades\Auth;

class ProjectService implements ProjectServiceInterface
{
    protected $projectRepository;
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function create($params):ApiResponse
    {
        $create = array_merge(['admin_id'=>Auth::id(),'status' => Project::STATUS_ACTIVE,'order' => 0],$params);
        $this->projectRepository->create($create);
        return new ResponseSuccess();
    }

    public function list()
    {
        return $this->projectRepository->getAll();
    }

    public function projectActive()
    {
        return $this->projectRepository->find([
            'status' => Project::STATUS_ACTIVE
        ]);
    }
}
