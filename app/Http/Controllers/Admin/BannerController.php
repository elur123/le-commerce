<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\EditBannerRequest;
use App\Http\Resources\BannerResource;
use Inertia\Inertia;
use Inertia\Response;

use App\Models\Banner;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::query()
        ->filter(request()->s)
        ->paginate(10);

        return Inertia::render('Admin/Banners/Index', [
            'banners' => BannerResource::collection($banners),
            'search' => [
                'keyword' => request()->s,
                'url' => route('settings.banners.index'),
            ],
            'identifiers' => [
                [ 'key' => 'image', 'type' => 'image', 'url_key' => 'image_url' ],
                [ 'key' => 'title', 'type' => 'label', 'url_key' => '' ],
                [ 'key' => 'sub_title', 'type' => 'label', 'url_key' => '' ],
                [ 'key' => 'is_display', 'type' => 'label', 'url_key' => '' ],
                [ 'key' => 'actions', 'type' => 'actions', 'url_key' => '' ],
            ],
            'columns' => ['image', 'title', 'sub title', 'is display', ''],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Banners/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request)
    {
        $banner = Banner::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'is_display' => $request->boolean('is_display'),
            'image_name' => 'NA',
            'image_url' => 'NA'
        ]);

        if ($request->hasFile('image')) 
        {
            $file = $request->file('image');
            $imageName = Str::random(8). '.' .$file->getClientOriginalExtension();

            // Save product image
            $imagePath = $file->storeAs('public/files/banners', $imageName);

            $banner->update([
                'image_name' => $imageName,
                'image_url' => $imagePath
            ]); 
        }

        return Redirect::route('settings.banners.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return Inertia::render('Admin/Banners/Edit', [
            'banner' => $banner
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditBannerRequest $request, Banner $banner)
    {
        $banner->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'is_display' => $request->boolean('is_display'),
        ]);

        if ($request->hasFile('image')) 
        {
            $file = $request->file('image');
            $imageName = Str::random(8). '.' .$file->getClientOriginalExtension();

            // Save product image
            $imagePath = $file->storeAs('public/files/banners', $imageName);

            $banner->update([
                'image_name' => $imageName,
                'image_url' => $imagePath
            ]); 
        }

        return Redirect::route('settings.banners.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        //
    }
}
