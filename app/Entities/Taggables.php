<?php

namespace Modules\Tag\Entities;

use Illuminate\Database\Eloquent\Model;

class Taggables extends Model
{
    protected $table = 'taggables';
    protected $fillable = [
    	'id',
        'tag_id',
        'taggables_id',
        'taggables_type',
        'created_at',
        'updated_at'
    ];
}
