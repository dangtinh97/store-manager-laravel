<?php

namespace App\Repositories\Contract;

use App\Models\Contract;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class ContractRepository extends BaseRepository implements ContractRepositoryInterface
{
    public function __construct(Contract $model)
    {
        parent::__construct($model);
    }
}
