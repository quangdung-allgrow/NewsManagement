<?php

namespace App\Repositories\News;

use App\Repositories\BaseRepository;

interface NewsRepository extends BaseRepository
{
	public function reformatData(array &$attributes);
}
