<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\BannerResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\StoreProductResource;
use App\Http\Resources\CourierResource;
use Inertia\Inertia;

use App\Models\Banner;
use App\Models\Category;
use App\Models\StoreProduct;
use App\Models\Courier;
use App\Models\Cart;
class LandingController extends Controller
{
    
    public function index()
    {
        $products = StoreProduct::query()
        ->with('product')
        ->paginate(10);

        $carts = Cart::query()
        ->with('storeProduct.product')
        ->where('user_id', auth()->user()->id ?? null)
        ->get();

        $data = [
            'banners' => BannerResource::collection(Banner::all()),
            'categories' => CategoryResource::collection(Category::all()),
            'products' => StoreProductResource::collection($products),
            'couriers' => CourierResource::collection(Courier::all()),
            'cart_count' => $carts->count(),
            'filter' => [
                'keyword' => request()->s,
                'page' => request()->page,
                'url' => route('index'),
            ]
        ];

        return  request()->expectsJson()
            ? $data
            : Inertia::render('Index', $data);
    }
}
