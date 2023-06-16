<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Models\Store;
use App\Models\StoreProduct;
class StoreProductController extends Controller
{
    
    public function store(Request $request, Store $store)
    {
        $request->validate([
            'product' => 'required',
            'quantity' => 'required',
            'price' => 'required'
        ]);

        StoreProduct::create([
            'store_id' => $store->id,
            'product_id' => $request->product['id'],
            'inventory' => $request->quantity,
            'price' => $request->price,
            'is_available' => $request->is_available
        ]);

        return Redirect::route('stores.show', $store);
    }

    public function update(Request $request, StoreProduct $storeProduct)
    {
        $request->validate([
            'product' => 'required',
            'quantity' => 'required',
            'price' => 'required'
        ]);

        $storeProduct->update([
            'inventory' => $request->quantity,
            'price' => $request->price,
            'is_available' => $request->is_available
        ]);

        return Redirect::route('stores.show', $storeProduct->store_id);
    }
}
