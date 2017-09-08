<?php

namespace App\Repositories\News\Cache;

use App\Repositories\News\NewsRepository;
use App\Repositories\CacheEloquentBaseRepository;

class CacheNewsRepository extends CacheEloquentBaseRepository implements NewsRepository
{
    protected $repository;
    protected $entityName;

    public function __construct(NewsRepository $repository) {
        parent::__construct();
        $this->repository = $repository;
        $this->entityName = $this->entityName();
    }

	public function paginate($limit, $orderBy = 'id', $sortOrder = 'DESC')
    {
        return $this->model->select('news.id', 'news.title', 'news.title_slug', 'news.lock', 'news.content', 'news_categories.title as ca_title', 'news_categories.title_slug as ca_title_slug', 'users.first_name', 'users.last_name', 'users.email')
        ->leftJoin('news_categories', function($join) {
        	$join->on('news.news_cate_id', 'news_categories.id');
        })->leftJoin('users', function($join) {
        	$join->on('news.user_id', 'users.id');
        })->orderBy($orderBy, $sortOrder)->paginate($limit);
    }

    public function reformatData(array &$attributes) {

    	$attributes['lock'] = isset($attributes['lock']) ? 1 : 0;
        $attributes['title_slug'] = str_slug($attributes['title'], '-');

    }

}