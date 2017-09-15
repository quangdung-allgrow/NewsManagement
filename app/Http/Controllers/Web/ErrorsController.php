<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ErrorsController extends Controller
{
    public function notFound() {
        return view('errors.404');
    }

}
