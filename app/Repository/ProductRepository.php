<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProductRepository
{
    private Model $model;
    private Request $request;

    public function __construct(Model $model, Request $request)
    {
        $this->model = $model;
        $this->request = $request;
    }

    public function selectConditions($conditions) {
        $expressions = explode(';', $conditions);

        $where = '';
        foreach ($expressions as $e) {
            $exp = explode(':', $e);
            $where = $this->model->where($exp[0], $exp[1], $exp[2]);
        }

        return $where;
    }

    public function selectFilter($filters) {
        return $this->model->selectRaw($filters);
    }
}
