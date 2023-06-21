<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Resources\CourierResource;
use App\Http\Resources\CartResource;
use Inertia\Inertia;

use App\Models\Courier;
use App\Models\Cart;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = Cart::query()
            ->with('storeProduct.store', 'storeProduct.product')
            ->where('user_id', auth()->user()->id)
            ->get();

        $groupedCarts = $carts->mapToGroups(function ($cart) {
            return [$cart->storeProduct->store->name => CartResource::make($cart)];
        });
        
        $groupedCartCollections = $groupedCarts->map(function ($groupedCart) {
            return CartResource::collection($groupedCart);
        });
        
        return Inertia::render('LandingPage/Cart', [
            'couriers' => CourierResource::collection(Courier::all()),
            'cart_count' => $carts->count(),
            'groupCarts' => $groupedCartCollections,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Cart::create([
            'user_id' => auth()->user()->id,
            'store_product_id' => $request->store_product_id,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'sub_total' => doubleval($request->price) * doubleval($request->quantity)
        ]);

        return Redirect::back()
        ->with('status', true);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        
    }
}
