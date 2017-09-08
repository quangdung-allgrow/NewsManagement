<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\News\NewsRepository;
use App\Repositories\News\NewsCategoriesRepository;
use DB;

class HomeController extends Controller
{
	private $news;
	private $newsCategories;

	public function __construct(NewsRepository $news, NewsCategoriesRepository $newsCategories) {
        $this->news = $news;
        $this->newsCategories = $newsCategories;
    }

    public function index() {
    	$news = $this->news->paginate(6, 'news.created_at');
    	$newsCategories = $this->newsCategories->all();

    	return view('blogs.index', compact('news', 'newsCategories'));
    }

    public function newsDetail($title_slug) {
    	$news = $this->news->findByAttributes([
                'title_slug' => $title_slug
            ]);

        if (empty($news)) {
            return view('errors.404');
        }
        
        $newsCategories = $this->newsCategories->all();

    	return view('blogs.detail', compact('news', 'newsCategories'));
    }

    public function showCate($title_slug) {

    }

    
}
