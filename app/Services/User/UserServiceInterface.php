<?php

namespace App\Services\User;

use App\Http\Responses\ApiResponse;

interface UserServiceInterface
{
    public function create($params):ApiResponse;
    public function list();
}
