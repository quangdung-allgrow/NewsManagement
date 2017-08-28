<?php

namespace App\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Repositories\Auth\Authentication;

class UserComposer
{
    /**
     * @var Authentication
     */
    private $auth;

    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    public function compose(View $view)
    {
        $view->with('user', $this->auth->check());
    }
}
