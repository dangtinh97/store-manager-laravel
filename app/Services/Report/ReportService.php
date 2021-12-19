<?php

namespace App\Services\Report;

use App\Models\Contract;
use App\Models\HistoryBill;
use App\Repositories\Contract\ContractRepositoryInterface;
use App\Repositories\HistoryBill\HistoryBillRepositoryInterface;

class ReportService implements ReportServiceInterface
{
    protected $historyBillRepository;
    protected $contractRepository;

    public function __construct(HistoryBillRepositoryInterface $historyBillRepository, ContractRepositoryInterface $contractRepository)
    {
        $this->historyBillRepository = $historyBillRepository;
        $this->contractRepository = $contractRepository;
    }

    public function index():array
    {
        $billSuccess = $this->historyBillRepository->find([
            'status' => HistoryBill::STATUS_NORMAL
        ]);

        $moneyBill = 0;
        $quantityWeek = 0;
        $moneyWeek =0;

        $days =[];
        for($i=0;$i<7;$i++)
        {
            $days[] = date('d-m',strtotime("-$i day"));
        }
        $days = array_reverse($days);

        $moneyInAWeek = [];
        foreach ($billSuccess as $bill)
        {
            $moneyBill += $bill->price * $bill->quantity;
            $timestamp = strtotime($bill->created_at);
            $date = date('d-m',$timestamp);
            if(in_array($date,$days))
            {
                $moneyInAWeek[$date] = $bill->price * $bill->quantity;
            }
            if($timestamp>strtotime('monday this week 00:00:00') &&
                $timestamp<strtotime('sunday this week 23:59:59')){
                $quantityWeek +=$bill->quantity;
                $moneyWeek +=$bill->price * $bill->quantity;

            }
        }
        $resultMoneyInWeek = [];
        $bill7LastDay = array_keys($moneyInAWeek);

        foreach ($days as $day){
            if(in_array($day,$bill7LastDay)){
                $resultMoneyInWeek[$day] = $moneyInAWeek[$day];
            }else{
                $resultMoneyInWeek[$day] = 0;
            }
        }

        $contract = $this->contractRepository->find([
            'status' => Contract::STATUS_NEW
        ]);
        return [
            'bill' => $billSuccess,
            'contract' => $contract->count(),
            'money_bill' => $moneyBill,
            'quantity_week' => $quantityWeek,
            'money_week' => $moneyWeek,
            'result_in_week' => ($resultMoneyInWeek),
            'days' => array_keys($resultMoneyInWeek),
            'moneys' => array_values($resultMoneyInWeek)
        ];
    }
}
