<?php

namespace App\Repositories\HistoryBill;

use App\Models\HistoryBill;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class HistoryBillRepository extends BaseRepository implements HistoryBillRepositoryInterface
{
    public function __construct(HistoryBill $model)
    {
        parent::__construct($model);
    }
}
