<?php

namespace App\Services\Admin;

interface AdminServiceInterface
{
    public function index();
    public function create($params);
}
