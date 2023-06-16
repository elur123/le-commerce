<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\BannerResource;
use App\Http\Resources\CategoryResource;
use Inertia\Inertia;

use App\Models\Banner;
use App\Models\Category;
class LandingController extends Controller
{
    
    public function index()
    {
        return Inertia::render('Index', [
            'banners' => BannerResource::collection(Banner::all()),
            'categories' => CategoryResource::collection(Category::all())
        ]);
    }
}
