<?php

namespace App\Repositories\User;

/**
 * Interface UserRepository
 * @package Modules\User\Repositories
 */
interface UserRepository
{
    /**
     * Returns all the users
     * @return object
     */
    public function all();

    /**
     * Paginate record
     */
    public function paginate($limit, $orderBy, $sortOrder);

    /**
     * Create a user resource
     * @param  array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Find a user by its ID
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Update a user
     * @param $userId
     * @param $data
     * @return mixed
     */
    public function update($userId, $data);

    /**
     * Update a user and sync its roles
     * @param  int   $userId
     * @param $data
     * @param $roles
     * @return mixed
     */
    public function updateAndSyncRoles($data, $roles, $userId);

    /**
     * Deletes a user
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * Find a user by its credentials
     * @param  array $credentials
     * @return mixed
     */
    public function findByCredentials(array $credentials);

    /**
     * Checks if a user belongs to the given Role ID
     * @param Cartalyst\Sentinel\Users\EloquentUser $user
     * @param  int $roleId
     * @return bool
     */
    public function hasRoleId($user, $roleId);

    /**
     * Checks if a user belongs to the given Role Name
     * @param  string $name
     * @return bool
     */
    public function hasRoleName($name);

    /**
     * Check if the current user is activated
     * @param Cartalyst\Sentinel\Users\EloquentUser $user
     * @return bool
     */
    public function isActivated($user);

    /**
     * @inheritdoc
     */
    public function hasAccess($permission);
}
