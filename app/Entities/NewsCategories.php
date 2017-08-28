<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class NewsCategories extends Model
{
    protected $table = 'news_categories';
    
    public function news() {
        return $this->hasMany('App\Entities\News', 'news_cate_id');
    }

}
