<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use App\Services\ProductService;
use Inertia\Inertia;
use Inertia\Response;

use App\Models\Product;
use App\Models\Category;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $merchant;

    public function __construct(
        protected ProductService $service
    ) 
    {
        $this->middleware(function ($request, $next) {
            $this->merchant = auth()->user()->merchant;
            return $next($request);
        });

        
    }

    public function index()
    {
        $products = Product::query()
        ->where('merchant_id', $this->merchant->id)
        ->filter(request()->s)
        ->paginate(10);

        return Inertia::render('Merchant/Products/Index', [
            'products' => ProductResource::collection($products),
            'search' => [
                'keyword' => request()->s,
                'url' => route('products.index'),
            ],
            'identifiers' => [
                [ 'key' => 'image', 'type' => 'image', 'url_key' => 'image_url' ],
                [ 'key' => 'name', 'type' => 'label', 'url_key' => '' ],
                [ 'key' => 'description', 'type' => 'label', 'url_key' => '' ],
                [ 'key' => 'category', 'type' => 'label', 'url_key' => '' ],
                [ 'key' => 'initial_price', 'type' => 'label', 'url_key' => '' ],
                [ 'key' => 'actions', 'type' => 'actions', 'url_key' => '' ],
            ],
            'columns' => ['image', 'name', 'description', 'category', 'initial price', ''],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Merchant/Products/Create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $this->service->store($request, $this->merchant);

        return Redirect::route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load('category','images');

        $product->featuredUrl = str_replace('public', '/storage', $product->featured_image_url);
        $product->productImages = $product->images
        ->map(fn($image) => [
            'id' => $image->id,
            'url' => str_replace('public', '/storage', $image->image_url),
            'isFavorite' => $image->is_featured_image,
            'actions' => [
                'setFavorite' => route('product-image.set-favorite', $image),
                'remove' => route('product-image.remove', $image)
            ]
        ]);

        return Inertia::render('Merchant/Products/Show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $product->load('category', 'images');

        $product->productImages = $product->images
        ->map(fn($image) => [
            'id' => $image->id,
            'url' => str_replace('public', '/storage', $image->image_url),
            'isFavorite' => $image->is_featured_image,
            'actions' => [
                'remove' => route('product-image.remove', $image)
            ]
        ]);

        return Inertia::render('Merchant/Products/Edit', [
            'categories' => Category::all(),
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditProductRequest $request, Product $product)
    {

        $this->service->update($request, $product, $this->merchant);
        
        return Redirect::route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
