<?php

namespace App\Services\Project;

use App\Http\Responses\ApiResponse;
use App\Http\Responses\ResponseError;
use App\Http\Responses\ResponseSuccess;
use App\Models\Project;
use App\Repositories\Project\ProjectRepository;
use App\Repositories\Project\ProjectRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ProjectService implements ProjectServiceInterface
{
    protected $projectRepository;
    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function create($params):ApiResponse
    {
        $create = array_merge(['admin_id'=>Auth::id(),'status' => Project::STATUS_NEW,'order' => 0],$params);
        $this->projectRepository->create($create);
        return new ResponseSuccess();
    }

    public function list()
    {
        return $this->projectRepository->getAll();
    }

    public function projectByStatus(string $status)
    {
        return $this->projectRepository->find([
            'status' => $status
        ]);
    }

    public function show($id)
    {
        return $this->projectRepository->findById($id);
    }

    public function update($id, $params): ApiResponse
    {
        $project = $this->projectRepository->findById($id);
        if(is_null($project)) return new ResponseError("NOT FOUND",404);
        $project->update($params);
        return new ResponseSuccess();
    }
}
