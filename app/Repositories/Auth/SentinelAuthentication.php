<?php

namespace App\Repositories\Auth;

use App\Repositories\Auth\Authentication;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;

class SentinelAuthentication implements Authentication
{
	/**
     * Authenticate a user
     * @param  array $credentials
     * @param  bool  $remember    Remember the user
     * @return mixed
     */
    public function login(array $credentials, $remember = false) {
    	try {
            if (Sentinel::authenticate($credentials, $remember)) {
                return false;
            }

            return __('auth.messages.invalid login');
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();

            return __('auth.messages.account lock', ['delay' => $delay]);
        }
    }

    /**
     * Register a new user.
     * @param  array $user
     * @return bool
     */
    public function register(array $user){
    	return Sentinel::getUserRepository()->create((array) $user);
    }

    /**
     * Log the user out of the application.
     * @return mixed
     */
    public function logout(){
    	return Sentinel::logout();
    }

    /**
     * Determines if the current user has access to given permission
     * @param $permission
     * @return bool
     */
    public function hasAccess($permission){
    	if ( !$this->check() ) {
            return false;
        }

        return Sentinel::hasAccess($permission);
    }

    /**
     * Check if the user is logged in
     * @return mixed
     */
    public function check(){
    	return Sentinel::check();
    }

    /**
     * Get the ID for the currently authenticated user
     * @return int
     */
    public function id(){
    	if ( !$user = $this->check() ) {
            return;
        }

        return $user->id;
    }
}