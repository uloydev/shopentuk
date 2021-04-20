<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allNews = '';
        $view = '';
        $title = '';

        switch (request()->path()) {
            case 'admin/news/manage':
                $allNews = News::all();
                $view = 'news.manage';
                $title = 'Manage news';
                break;
            
            case 'news/archive':
                $allNews = News::paginate(10)->withQueryString();
                $view = 'news.index';
                $title = 'All news';
                break;
        }
        return view($view, get_defined_vars());
    }

    public function store()
    {
        News::create([
            'title' => request('title'),
            'desc' => request('desc')
        ]);
        return redirect()->back()->with('success', 'Successfully create article');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $news->update([
            'title' => request('title'),
            'desc' => request('desc')
        ]);
        return redirect()->back()->with('success', 'Successfully update article');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        // dd($news);
        $news->delete();
        return redirect()->back()->with('success', 'Successfully delete article');
    }
}
