<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    
    protected $dates = ['deleted_at'];

    protected $fillable = [
    	'id',
    	'news_cate_id',
		'user_id',
		'title',
		'title_slug',
		'short_desc',
		'content',
		'keyword_seo',
		'description_seo',
		'pin',
		'lock',
		'thumbnail',
		'views',
		'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function scopeLock($query, $lock) {
    	return $query->where('lock',$lock);
    }

    public function newsCategories(){
		return $this->belongsTo('App\Entities\NewsCategories', 'news_cate_id');
	}

	public function users(){
		return $this->belongsTo('App\Entities\Sentinel\User', 'user_id');
	}

    public function tags()
    {
    	// taggables tên bảng được liên kết
        return $this->morphToMany('App\Entities\Tag', 'taggables');
    }

}
