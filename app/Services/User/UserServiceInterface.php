<?php

namespace App\Services\User;

use App\Http\Responses\ApiResponse;

interface UserServiceInterface
{
    public function create($params):ApiResponse;
    public function list();
    public function show($id);
    public function update($id,$params):ApiResponse;
}
