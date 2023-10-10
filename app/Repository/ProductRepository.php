<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ProductRepository
{
    private Builder $model;

    public function __construct(Builder $model)
    {
        $this->model = $model;
    }

    public function selectConditions($conditions) {
        $expressions = explode(';', $conditions);
        foreach ($expressions as $e) {
            $exp = explode(':', $e);
            $this->model = $this->model->where($exp[0], $exp[1], $exp[2]);
        }
    }

    public function selectFilter($filters) {
        $this->model = $this->model->selectRaw($filters);
    }

    public function getResult(){
        return $this->model;
    }
}
