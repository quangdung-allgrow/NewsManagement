<?php

namespace App\Http\Controllers\Admin\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\News\NewsRepository;
use App\Repositories\News\NewsCategoriesRepository;
use App\Http\Requests\News\AddNewsRequest;
use App\Http\Requests\News\UpdateNewsRequest;
use App\Repositories\Auth\Authentication;
use Session;

class NewsController extends Controller
{
    private $news;
    private $newsCategories;

    public function __construct(NewsRepository $news, NewsCategoriesRepository $newsCategories, Authentication $auth) {
        $this->news = $news;
        $this->newsCategories = $newsCategories;
        $this->auth = $auth;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = $this->news->paginate(10);

        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newsCategories = $this->newsCategories->all();

        return view('news.create', compact('newsCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddNewsRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = $this->auth->check()->id;

        $create = $this->news->create($data);

        if ($request->submit == 'save_continue') {
           return redirect()->back();
        }

        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = $this->news->find($id);
        $newsCategories = $this->newsCategories->all();

        return view('news.edit', compact('news', 'newsCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, $id)
    {
        $model = $this->news->find($id);

        $data = $request->all();
        $data['user_id'] = $this->auth->check()->id;

        $this->news->update($model, $data);

        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
