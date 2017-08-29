<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Routing\Controller;
use App\Repositories\News\NewsRepository;

class NewsController extends Controller
{
    private $news;

    public function __construct(NewsRepository $news) {
        $this->news = $news;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function delete(Request $request)
    {
        $delete = $this->news->destroy($request->id);

        if ($delete) {
            return Response::json([
                'code' => 200,
                'message' => __('app.messages.success'),
                'data' => null
            ]);
        }

        return Response::json([
                'code' => 401,
                'message' => __('app.messages.failed'),
                'data' => null
            ]);
    }
}
