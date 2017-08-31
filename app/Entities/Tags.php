<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
	protected $table = 'tags';

    protected $fillable = [
        'id',
    	'tags_name',
        'tags_slug',
        'created_at',
        'updated_at'
    ];

    public function news() {
        // taggables tên bảng được liên kết
        return $this->morphedByMany('App\Entities\News', 'taggables');
    }
}
