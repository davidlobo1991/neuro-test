<?php

namespace App\Http\Controllers;

use App\Services\Providers\LastCategoriesProvider;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    private LastCategoriesProvider $lastCategoriesProvider;
    public function __construct(LastCategoriesProvider $lastCategoriesProvider)
    {
        $this->lastCategoriesProvider = $lastCategoriesProvider;
    }
    public function index()
    {
        $userId = Auth::id();

        $lastCategories = $this->lastCategoriesProvider->provide($userId);

        return response(json_encode($lastCategories), 200)
            ->header('Content-Type', 'text/json');

    }

}
