<?php

namespace App\Services\DeliveryNote;

use App\Http\Responses\ApiResponse;

interface DeliveryNoteServiceInterface
{
    public function store(array $params):ApiResponse;
    public function list();
    public function show($id);
}
