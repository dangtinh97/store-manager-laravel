<?php

namespace App\Repositories;

use App\Helpers\ComparisonHelper;
use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    public $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function find(array $cond)
    {
        $model = $this->model->newQuery();
        foreach ($cond as $key => $value) {
            $model->where($key, '=', $value);
        }
        return $model->get();
    }

    public function findComparison($cond)
    {
        $model = $this->model->newQuery();
        foreach ($cond as $key => $value) {
            if(!is_array($value)){
                $model->where($key,'=',$value);
                continue;
            }
            if(is_array($value)){
                $model->where($key,ComparisonHelper::convert(array_keys($value)[0]),array_values($value)[0]);
                continue;
            }
        }
        return $model->get();
    }

    public function create($data){
        return $this->model->create($data);
    }
}
