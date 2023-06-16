<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Services\ProductService;

use App\Models\Product;
use App\Models\ProductImage;
class ProductImageController extends Controller
{

    public function __construct(
        protected ProductService $service
    ) 
    {  

    }
    
    public function remove(ProductImage $image)
    {
        $product = $image->product;

        Storage::delete($image->image_url);

        $image->delete();

        $this->service->updateFeaturedImage($product);

        return Redirect::back();
    }

    public function setFavoriteImage(ProductImage $image)
    {

        $product = Product::find($image->product_id);

        $product->images()->update([
            'is_featured_image' => false
        ]);

        $image->update([
            'is_featured_image' => true
        ]);

        $this->service->updateFeaturedImage($product);
        
        return Redirect::back();
    }
}
