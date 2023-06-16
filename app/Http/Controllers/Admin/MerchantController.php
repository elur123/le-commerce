<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use App\Http\Resources\MerchantResource;
use Inertia\Inertia;
use Inertia\Response;

use App\Models\Merchant;
use App\Models\Status;
class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $merchants = Merchant::query()
        ->with('user', 'products')
        ->merchant()
        ->where('is_validated', true)
        ->paginate(10);

        return Inertia::render('Admin/Merchant/Index', [
            'merchants' => MerchantResource::collection($merchants),
            'identifiers' => [
                [ 'key' => 'name', 'type' => 'label', 'url_key' => '' ],
                [ 'key' => 'company_name', 'type' => 'label', 'url_key' => '' ],
                [ 'key' => 'mobile_number', 'type' => 'label', 'url_key' => '' ],
                [ 'key' => 'total_product', 'type' => 'label', 'url_key' => '' ],
                [ 'key' => 'actions', 'type' => 'actions', 'url_key' => '' ],
            ],
            'columns' => ['name', 'company name', 'mobile number', 'total product', ''],
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Merchant $merchant)
    {
        $merchant->load('user', 'documents.status');
        $merchant->documentSubmitted = $merchant->documents->map(fn($document) => [
            'id' => $document->id,
            'document' => $document->document,
            'note' => $document->notes,
            'status_id' => $document->status_id,
            'status' => $document->status->label,
            'actions' => $document->status_id === Status::PENDING
            ? [
                ['label' => 'Approved', 'href' => route('document-validation.status', ['document' => $document, 'status' => Status::APPROVED]), 'type' => 'put'],
                ['label' => 'Declined', 'href' => route('document-validation.status', ['document' => $document, 'status' => Status::DECLINED]), 'type' => 'put'],
            ]
            : []
        ]);

        return Inertia::render('Admin/Merchant/Show', [
            'merchant' => $merchant,
            'actions' => [
                [
                    'label' => $merchant->is_validated ? 'Mark as unverified' : 'Mark as verified', 
                    'href' => route('merchants.status-update', ['merchant' => $merchant, 'status' => $merchant->is_validated ? 0 : 1]),
                    'type' => 'put'
                ],
                    
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Merchant $merchant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Merchant $merchant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Merchant $merchant)
    {
        //
    }

    public function newMerchants()
    {
        $newMerchants = Merchant::query()
        ->with('user')
        ->where('is_validated', false)
        ->paginate(10)
        ->through(fn($merchant) => [
            'id' => $merchant->id,
            'name' => $merchant->user->name,
            'company_name' => $merchant->name,
            'company_address' => $merchant->address,
            'mobile_no' => $merchant->mobile_number,
            'actions' => [
                ['label' => 'Show', 'href' => route('merchants.show', $merchant), 'type' => 'get'],
                [
                    'label' => $merchant->is_validated ? 'Mark as unverified' : 'Mark as verified', 
                    'href' => route('merchants.status-update', ['merchant' => $merchant, 'status' => $merchant->is_validated ? 0 : 1]),
                    'type' => 'put'
                ],
                
            ]
        ]);

        return Inertia::render('Admin/Merchant/NewMerchant', [
            'merchants' => $newMerchants,
            'search' => [
                'keyword' => request()->s,
                'url' => route('categories.index'),
            ],
            'identifiers' => [
                [ 'key' => 'name', 'type' => 'label', 'url_key' => '' ],
                [ 'key' => 'company_name', 'type' => 'label', 'url_key' => '' ],
                [ 'key' => 'mobile_number', 'type' => 'label', 'url_key' => '' ],
                [ 'key' => 'actions', 'type' => 'actions', 'url_key' => '' ],
            ],
            'columns' => ['name', 'company name', 'mobile number', ''],
        ]);
    }

    public function statusUpdate(Merchant $merchant, $status)
    {

        $merchant->update([
            'is_validated' => $status
        ]);

        return Redirect::back();
    }
}
