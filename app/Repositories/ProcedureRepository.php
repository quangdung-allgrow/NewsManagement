<?php

namespace App\Repositories;

/**
 * Interface BaseRepository
 */
interface ProcedureRepository
{
    /**
     * Query by dynamic procedure
     */
    public function procedureQuery($query);

    /**
     * @param  int    $id
     * @return $model
     */
    public function procedureFind($id);

    /**
     * Return a collection of all elements of the resource
     * @return mixed
     */
    public function procedureAll();

    /**
     * Paginate record
     */
    public function procedurePaginate($limit, $orderBy = 'id', $sortOrder = 'DESC');

    /*
     * Create a resource
     * @param $data
     * @return mixed
     */
    public function procedureCreate($data);

    // /**
    //  * Update a resource
    //  * @param $model
    //  * @param  array $data
    //  * @return mixed
    //  */
    // public function procedureUpdate($model, $data);

    // /**
    //  * Destroy a resource
    //  * @param $model
    //  * @return mixed
    //  */
    // public function procedureDestroy($model);

    /**
     * Find a resource by an array of attributes
     * @param  array  $attributes
     * @return object
     */
    public function procedureFindByAttributes(array $attributes, array $conditionLink);

    // /**
    //  * Get resources by an array of attributes
    //  * @param array $attributes
    //  * @param null|string $orderBy
    //  * @param string $sortOrder
    //  * @return \Illuminate\Database\Eloquent\Collection
    //  */
    // public function procedureGetByAttributes(array $attributes, $orderBy = null, $sortOrder = 'asc');

    /**
     * Build statement procdure by an array of attributes
     */
    public function procedureBuildStatement($numberAtts, $functionName);
}
