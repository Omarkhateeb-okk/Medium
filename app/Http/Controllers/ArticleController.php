<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use App\Models\Tag;
use App\Models\User;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{



    public function index()
    {
        $articles = Article::with(['tags', 'author'])
           ->when(request('tag_id'), function($query) {
                return $query->whereHas('tags', function($q) {
                    return $q->where('id', request('tag_id'));
                });
            })

            ->when(request('query'), function($query) {
                return $query->where('title', 'like', '%'.request('query').'%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
            $all_tags = Tag::all();
        return view('articles.index', compact('articles','all_tags'));
//        شلون بدي ابعت للسايد بار متحول ال$all_tag بدون ما اعمل return
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(StoreArticleRequest $request)
    {
        $article = Article::create($request->all() + ['user_id' => auth()->id()]);

        if ($request->tags != '') {
            $tags = explode(',', $request->tags);
            foreach ($tags as $tag_name) {
                $tag = Tag::firstOrCreate(['name' => $tag_name]);
                $article->tags()->attach($tag);
            }
        }

        if ($request->hasFile('main_image')) {
            $article->addMediaFromRequest('main_image')->toMediaCollection('main_images');
        }
        if ($request->hasFile('gallery_images')) {
            $article->addMediaFromRequest('gallery_images')->toMediaCollection('gallery_images');
        }

        return redirect()->route('articles.index');
    }


    public function show(Article $article)
    {
        $article->load(['tags', 'author']);

        $all_tags = Tag::all();

        return view('articles.show', compact('article', 'all_tags'));


    }

    public function edit(Article $Article)
    {
        return view('articles.edit',compact('Article'));
    }


    public function update(Request $request, Article $Article)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $Article = Article::update($request->all());
        return redirect()->route('articles.index')
            ->with('success', 'Article updated successfully');
    }


    public function destroy(Article $Article)
    {
        $Article->delete();
        return redirect()->route('articles.index')
            ->with('success', 'Article deleted successfully');
    }

    public function dash(request $request)
    {
        if (Auth::user()->role==0)
        {
            $articles = Article::all();
            dd($articles);
        return view('articles.dash',compact('articles'));
        }else
        {
            return back()->withErrors(['message'=>'you are not admin']);

        }

    }
}
