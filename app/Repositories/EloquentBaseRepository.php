<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Repositories\Auth\Authentication;
use Illuminate\Database\Eloquent\Model;

abstract class EloquentBaseRepository implements BaseRepository
{

    protected $model;
    protected $auth;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->auth = app()->make(Authentication::class);
        $this->model = $model;
    }

    /**
     * @param  int    $id
     * @return object
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->model->orderBy('created_at', 'DESC')->get();
    }

    public function limit($limit, $orderBy = 'created_at', $sortOrder = 'desc')
    {
        return $this->model->orderBy($orderBy, $sortOrder)->skip(0)->take($limit)->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function paginate($limit, $orderBy = 'id', $sortOrder = 'DESC')
    {
        return $this->model->orderBy($orderBy, $sortOrder)->paginate($limit);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allSortID($order = 'asc')
    {
        return $this->model->orderBy('id', $order)->get();
    }

    /**
     * @param  mixed  $data
     * @return object
     */
    public function create($data)
    {
        return $this->model->create($data);
    }

    /**
     * @param $model
     * @param  array  $data
     * @return object
     */
    public function update($model, $data)
    {
        $model->update($data);

        return $model;
    }

    /**
     * @param  int $id
     * @return bool
     */
    public function destroy($id)
    {
        $model = $this->find($id);

        return $model->delete();
    }

    /**
     * Find a resource by an array of attributes
     * @param  array  $attributes
     * @return object
     */
    public function findByAttributes(array $attributes, $return_array = false)
    {
        $query = $this->buildQueryByAttributes($attributes);
        if ($return_array) {
            return $query->get();
        }
        return $query->first();
    }

    /**
     * Return a collection of elements who's ids match
     * @param array $ids
     * @return mixed
     */
    public function findByMany(array $ids)
    {
        $query = $this->model->query();

        return $query->whereIn("id", $ids)->get();
    }
    
    /**
     * Get resources by an array of attributes
     * @param array $attributes
     * @param null|string $orderBy
     * @param string $sortOrder
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByAttributes(array $attributes, $orderBy = 'id', $sortOrder = 'asc')
    {
        $query = $this->buildQueryByAttributes($attributes, '=', $orderBy, $sortOrder);

        return $query->get();
    }

    /**
     * Build Query to catch resources by an array of attributes and params
     * @param array $attributes
     * @param null|string $orderBy
     * @param string $sortOrder
     * @return \Illuminate\Database\Query\Builder object
     */
    private function buildQueryByAttributes(array $attributes, $equal = '=', $orderBy = 'id', $sortOrder = 'asc')
    {
        $query = $this->model->query();

        foreach ($attributes as $field => $value) {
            $value = ($equal == 'like') ? '%'.$value.'%' : $value;
            $query = $query->where($field, $equal, $value);
        }

        if (null !== $orderBy) {
            $query->orderBy($orderBy, $sortOrder);
        }

        return $query;
    }

    
}