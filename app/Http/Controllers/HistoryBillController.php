<?php

namespace App\Http\Controllers;

use App\Services\HistoryBill\HistoryBillServiceInterface;
use Illuminate\Http\Request;

class HistoryBillController extends Controller
{
    protected $historyBillService;
    public function __construct(HistoryBillServiceInterface $historyBillService)
    {
        $this->historyBillService = $historyBillService;
    }

    public function index(Request $request)
    {
        $historiesBill = $this->historyBillService->list();
        return view('history_bill.list',compact('historiesBill'));
    }

    public function show($id)
    {
        $history = $this->historyBillService->show($id);
        if(is_null($history)) return abort(404);
        $contract = null;
        try{
            $bill = $history->bill;
            $project = $bill->project;
            $contract = $project->contract();
        }catch (\Exception $exception){

        }

        return view('history_bill.show',compact('history','contract'));
    }

    public function destroy($id)
    {
       return $this->historyBillService->destroy($id);
    }

}
