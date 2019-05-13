<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAllPaginatedRecords($amount = 30)
    {
        return $this->model->paginate(30);
    }

    public function insert(array $data)
    {
        return $this->model->insert($data);
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }
}