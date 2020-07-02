<?php

namespace App\Service;

use App\Exceptions\ModelNotFoundException;
use App\Repositories\BaseRepositoryInterface;

class BaseService
{
    protected $repository;

    public function __construct(BaseRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Return Instance of Repository
     * @param $repositoryName
     * @return mixed
     */
    public function getRepository($repositoryName)
    {
        return new $repositoryName();
    }

    /**
     * @param array $options
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function find($id)
    {
        $model = $this->getById($id);
        return $model;
    }

    /**
     * @param $modelId
     * @param array $options
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findById($modelId, array $options = [])
    {
        $model = $this->getById($modelId, $options);
        return $model;
    }

    /**
     * @param $data
     * @return \App\Models\User
     */
    public function create($data)
    {
        $model = $this->repository->create($data);
        return $model;
    }

    /**
     * @param $modelId
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function update(array $data, $modelId)
    {
        $model = $this->getById($modelId);
        $this->repository->update($model, $data);
        return $model;
    }


    /**
     * @param $modelId
     */
    public function delete($modelId)
    {
        $model = $this->getById($modelId);
        $this->repository->delete($model->id);
    }


    /**
     * @param $modelId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function getById($modelId)
    {
        $model = $this->repository->getById($modelId);

        if (is_null($model)) {
            throw new ModelNotFoundException($model);
        }

        return $model;
    }

    /**
     * @param $modelId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        $models = $this->repository->all();
        return $models;
    }

    /**
     * @param $modelId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPaginate($page)
    {
        $models = $this->repository->getPaginate($page);
        return $models;
    }

}