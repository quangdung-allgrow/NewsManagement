<?php

namespace App\Services;

use Cache;

class CacheApp
{

	public function has($key) {
		return Cache::has($key);
	}

	public function get($key) {
		return Cache::get($key, '');
	}

	public function put($key, $value, $minutes) {
		if ($this->has($key)) {
            $value = $this->get($key);
        } else {
            Cache::put($key, $value, $minutes);
        }

        return $value;
	}
}