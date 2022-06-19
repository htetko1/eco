<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles =Article::when(isset(request()->search),function ($q){
            $search = request()->search;
            $q->orWhere("title","like","%$search%")->orWhere("description","like","%$search%");
        })->with(['user','category'])->latest()->paginate(7);
        return view("article.index",compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "category"=> "required|exists:categories,id",
            "title"=> "required|min:5|max:100",
            "description"=> "required|min:5|max:5000"
        ]);

        $article = new Article();
        $article->title = $request->title;
//        $article->slug = Str::slug($request->title)."_".uniqid();
        $article->category_id = $request->category;
        $article->description = $request->description;
//        $article->excerpt = Str::words($request->description,50);
        $article->user_id = Auth::id();
        $article->save();


        return redirect()->route('article.index')->with('message','New Article Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show',compact('article'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit',compact('article'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            "category"=> "required|exists:categories,id",
            "title"=> "required|min:5|max:100",
            "description"=> "required|min:5|max:500"
        ]);

//        if ($article->title != $request->title){
//            $article->slug = Str::slug($request->title)."_".uniqid();
//        }
        $article->title = $request->title;
//        $article->slug = Str::slug($request->title)."_".uniqid();
        $article->category_id = $request->category;
        $article->description = $request->description;
//        $article->excerpt = Str::words($request->description,50);
        $article->update();


        return redirect()->route('article.index')->with('message','Article Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('article.index',["page"=>request()->page])->with('message','Article Deleted');
    }
}
