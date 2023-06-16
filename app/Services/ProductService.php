<?php

namespace App\Services;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\EditProductRequest;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Merchant;

class ProductService
{

    public function store(StoreProductRequest $request, Merchant $merchant)
    {
        $product = Product::create([
            'merchant_id' => $merchant->id,
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category['id'],
            'initial_price' => $request->initial_price,
            'featured_image' =>  'na',
            'featured_image_url' => 'na'
        ]);

        $this->storeUpdateProductImage($request, $merchant, $product);

        $this->updateFeaturedImage($product);
    }

    public function update(EditProductRequest $request, Product $product, Merchant $merchant)
    {
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category['id'],
            'initial_price' => $request->initial_price,
        ]);

        $this->storeUpdateProductImage($request, $merchant, $product);

        $this->updateFeaturedImage($product);
    }

    public function storeUpdateProductImage(Request $request, Merchant $merchant, Product $product)
    {
        foreach ($request->images as $key => $value) 
        {
            if (isset($value['file'])) 
            {
                $file = $value['file'];
                $fileName = $file->getClientOriginalName();

                // Save product image
                $imagePath = $file->storeAs('public/files/merchants/'. $merchant->uuid. '/products/'. $product->uuid, $fileName);
                
                $product->images()->create([
                    'image' => $fileName,
                    'image_url' => $imagePath,
                    'is_featured_image' => (bool) $value['isFavorite']
                ]);
            }

            else
            {
                $product->images()
                ->where('id', $value['id'])
                ->update([
                    'is_featured_image' => (bool) $value['isFavorite']
                ]);
            }
        }
    }

    public function updateFeaturedImage(Product $product)
    {
        $featured = $product->images()
        ->where('is_featured_image', true)
        ->first();
        
        $featured_image = 'default_image.png';
        $featured_image_url = asset('storage/files/default_image.png');

        if ($featured) 
        {
           $featured_image = $featured->image;
           $featured_image_url = $featured->image_url;
        }

        $product->update([
            'featured_image' => $featured_image,
            'featured_image_url' => $featured_image_url
        ]);
    }
}