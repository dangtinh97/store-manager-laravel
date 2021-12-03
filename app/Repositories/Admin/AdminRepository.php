<?php

namespace App\Repositories\Admin;

use App\Models\Admin;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class AdminRepository extends BaseRepository implements AdminRepositoryInterface
{
    public function __construct(Admin $model)
    {
        parent::__construct($model);
    }
}
