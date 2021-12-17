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

    public function findFirst($cond)
    {
        $model = $this->model->newQuery();
        foreach ($cond as $key => $value) {
            $model->where($key, '=', $value);
        }
        return $model->first();
    }

    public function findById(int $id)
    {
        return $this->model->find($id);
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
            }
        }
        return $model->get();
    }

    public function create($data){
        return $this->model->create($data);
    }

    public function getAll($sort = "DESC",$col="id")
    {
        $newQuery = $this->model->newQuery();

        if($sort ==="DESC") $newQuery->orderByDesc($col);

       return $newQuery->get();
    }
}
