<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Repositories\ArticleRepository;
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
            'articles' => ArticleResource::collection($this->articleRepository->filter()),
        ]);
    }
}
