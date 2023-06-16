<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\EditCategoryRequest;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;

use App\Models\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::query()
        ->filter(request()->s)
        ->paginate(10);

        return Inertia::render('Admin/Category/Index', [
            'categories' => CategoryResource::collection($categories),
            'search' => [
                'keyword' => request()->s,
                'url' => route('categories.index'),
            ],
            'identifiers' => [
                [ 'key' => 'image', 'type' => 'image', 'url_key' => 'image_url' ],
                [ 'key' => 'label', 'type' => 'label', 'url_key' => '' ],
                [ 'key' => 'actions', 'type' => 'actions', 'url_key' => '' ],
            ],
            'columns' => ['image', 'label', ''],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Category/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {

        $fileName = 'CAT-'.Str::random(4);
        $imagePath = '';
        if ($request->hasFile('image')) {
            
            $file = $request->file('image');
            $fileName .= '.'. $file->getClientOriginalExtension();
            
            // Save category image
            $imagePath = $file->storeAs('public/files/category', $fileName);
        }

        Category::create([
            'label' => $request->label,
            'image' => $fileName,
            'image_url' => $imagePath
        ]);

        return Redirect::route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return Inertia::render('Admin/Category/Edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $fileName = $category->image ?? 'CAT-'.Str::random(4);
        $imagePath = $category->image_url ?? '';
        if ($request->hasFile('image')) {
            
            $file = $request->file('image');
            $fileName .= '.'. $file->getClientOriginalExtension();
            
            // Save category image
            $imagePath = $file->storeAs('public/files/category', $fileName);
        }

        $category->update([
            'label' => $request->label,
            'image' => $fileName,
            'image_url' => $imagePath
        ]);

        return Redirect::route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        dd($category);
    }
}
