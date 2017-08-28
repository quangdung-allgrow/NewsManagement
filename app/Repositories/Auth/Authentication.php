<?php

namespace App\Repositories\Auth;

interface Authentication
{
    /**
     * Authenticate a user
     * @param  array $credentials
     * @param  bool  $remember    Remember the user
     * @return mixed
     */
    public function login(array $credentials, $remember = false);

    /**
     * Register a new user.
     * @param  array $user
     * @return bool
     */
    public function register(array $user);

    /**
     * Log the user out of the application.
     * @return mixed
     */
    public function logout();

    /**
     * Determines if the current user has access to given permission
     * @param $permission
     * @return bool
     */
    public function hasAccess($permission);

    /**
     * Check if the user is logged in
     * @return mixed
     */
    public function check();

    /**
     * Get the ID for the currently authenticated user
     * @return int
     */
    public function id();
}
