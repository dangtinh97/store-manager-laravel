<?php

namespace App\Services\Admin;

interface AdminServiceInterface
{
    public function index();
    public function create($params);
    public function show($id);
    public function destroy($id);
    public function update($id,$params);
}
