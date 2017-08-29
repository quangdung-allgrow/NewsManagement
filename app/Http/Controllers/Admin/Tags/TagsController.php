<?php

namespace App\Http\Controllers\Admin\Tags;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Tags\TagsRepository;


class TagsController extends Controller
{
    private $tags;

    public function __construct(TagsRepository $tags) {
        $this->tags = $tags;
    }

    public function getTags()
    {
        
    }

}
