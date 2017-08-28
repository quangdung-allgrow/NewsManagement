<?php

namespace Modules\Tag\Entities;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
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
