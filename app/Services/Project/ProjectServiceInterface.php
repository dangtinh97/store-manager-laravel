<?php

namespace App\Services\Project;

use App\Http\Responses\ApiResponse;

interface ProjectServiceInterface
{
    public function create($params):ApiResponse;
    public function list();
    public function projectByStatus(string $status);
    public function show($id);
    public function update($id,$params):ApiResponse;
}
