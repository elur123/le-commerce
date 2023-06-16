<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\EditStoreRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Resources\StoreResource;
use Inertia\Inertia;
use Inertia\Response;

use App\Models\Store;
class StoreController extends Controller
{

    private $merchant;

    public function __construct() 
    {
        $this->middleware(function ($request, $next) {
            $this->merchant = auth()->user()->merchant;
            return $next($request);
        });

        
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores = Store::query()
        ->where('merchant_id', $this->merchant->id)
        ->filter(request()->s)
        ->paginate(10);

        return Inertia::render('Merchant/Stores/Index', [
            'stores' => StoreResource::collection($stores),
            'search' => [
                'keyword' => request()->s,
                'url' => route('stores.index'),
            ],
            'identifiers' => [
                [ 'key' => 'name', 'type' => 'label', 'url_key' => '' ],
                [ 'key' => 'address', 'type' => 'label', 'url_key' => '' ],
                [ 'key' => 'mobile_no', 'type' => 'label', 'url_key' => '' ],
                [ 'key' => 'total_product', 'type' => 'label', 'url_key' => '' ],
                [ 'key' => 'actions', 'type' => 'actions', 'url_key' => '' ],
            ],
            'columns' =>  ['name', 'address', 'mobile_no', 'total product', ''],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Merchant/Stores/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStoreRequest $request)
    {
        Store::create([
            'merchant_id' => $this->merchant->id,
            'name' => $request->name,
            'address' => $request->address,
            'mobile_no' => $request->mobile_no
        ]);

        return Redirect::route('stores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        $store->load('products');

        $products = $this->merchant->products()
        ->whereNotIn('id', $store->products->pluck('id'))
        ->get();

        $store->storeProducts = $store->products
        ->map(fn($product) => [
            'id' => $product->pivot->id,
            'name' => $product->name,
            'price' => $product->pivot->price,
            'quantity' => $product->pivot->inventory,
            'availability' => (bool) $product->pivot->is_available ? 'Yes' : 'No',
            'is_available' => (bool) $product->pivot->is_available, 
            'actions' => [
                ['label' => 'Edit', 'href' => route('stores.show', $product), 'type' => 'function'],
            ]
        ]);


        return Inertia::render('Merchant/Stores/Show', [
            'store' => $store,
            'products' => $products
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        return Inertia::render('Merchant/Stores/Edit', [
            'store' => $store
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditStoreRequest $request, Store $store)
    {
        $store->update([
            'name' => $request->name,
            'address' => $request->address,
            'mobile_no' => $request->mobile_no
        ]);

        return Redirect::route('stores.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        //
    }
}
