<?php

namespace App\Services\Contract;

use App\Http\Responses\ApiResponse;

interface ContractServiceInterface
{
    public function create(array $params):ApiResponse;
    public function index();
    public function show($id);
}
