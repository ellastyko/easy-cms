<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use App\Repositories\ArticleRepository;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Exceptions\RepositoryException;

class ArticleController extends Controller
{
    /**
     * @param ArticleRepository $articleRepository
     */
    public function __construct(protected ArticleRepository $articleRepository)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws RepositoryException
     */
    public function index()
    {
        return response()->json([
            'articles' => ArticleResource::collection($this->articleRepository->filter())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        return request()->json([
           'article' => Article::create(array_merge($request->validated(), ['author_id' => Auth::id()]))
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
