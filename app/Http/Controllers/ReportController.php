<?php

namespace App\Http\Controllers;

use App\Services\Report\ReportServiceInterface;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected $reportService;
    public function __construct(ReportServiceInterface $reportService)
    {
        $this->reportService = $reportService;
    }

    public function index(){
        $data = $this->reportService->index();
//        dd($data);
        return view('report.index',compact('data'));
    }
}
