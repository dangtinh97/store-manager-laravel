<?php

namespace App\Services\HistoryBill;

use App\Http\Responses\ApiResponse;

interface HistoryBillServiceInterface
{
    public function create($bill):ApiResponse;
    public function list();
    public function show($id);
    public function destroy($id);
}
