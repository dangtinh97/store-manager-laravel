<?php

namespace App\Services\HistoryBill;

use App\Helpers\StrHelper;
use App\Http\Responses\ApiResponse;
use App\Http\Responses\ResponseSuccess;
use App\Models\Bill;
use App\Models\HistoryBill;
use App\Repositories\HistoryBill\HistoryBillRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HistoryBillService implements HistoryBillServiceInterface
{
    protected $historyBillRepository;
    public function __construct(HistoryBillRepositoryInterface $historyBillRepository)
    {
        $this->historyBillRepository = $historyBillRepository;
    }

    public function index()
    {

    }

    public function create($bill):ApiResponse
    {
       $findHistory = $this->historyBillRepository->findFirst([
            'status' => HistoryBill::STATUS_NORMAL,
            'bill_id' => (int)$bill->id
        ]);
       if(!is_null($findHistory)) return new ResponseSuccess([
           'code' => $findHistory->code
       ]);
       $create = $this->historyBillRepository->create([
           'bill_id' => $bill->id,
           'status' => HistoryBill::STATUS_NORMAL,
           'price' => $bill->price,
           'quantity' => $bill->quantity,
           'admin_id' => Auth::id(),
           'code' => StrHelper::quickRandom(6).date('dmy',time())
       ]);
       return new ResponseSuccess([
           'code' => $create->code
       ]);
    }

    public function list()
    {
        return $this->historyBillRepository->getAll();
    }

    public function show($id)
    {
       return $this->historyBillRepository->findById($id);
    }

    public function destroy($id)
    {
        $billHistory = $this->historyBillRepository->findById($id);
        $bill = $billHistory->bill();
        $bill->update([
           'status' => Bill::STATUS_BILL_NEW
        ]);
        $billHistory->update([
            'status' => HistoryBill::STATUS_DELETE
        ]);
        return  Redirect::route('histories-bill.show',$id);
    }
}
