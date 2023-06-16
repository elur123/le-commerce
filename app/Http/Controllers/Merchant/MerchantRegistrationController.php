<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

use App\Models\Merchant;
use App\Models\MerchantStep;
use App\Models\Status;
class MerchantRegistrationController extends Controller
{
    public function merchantInformation($step = 1)
    {
        $is_merchant = !empty(auth()->user()->merchant);

        $step = $is_merchant ? 2 : 1;
        $documents = auth()->user()->merchant->documents ?? [];
        return Inertia::render('Merchant/Registration/UpdateInformation', [
            'step' => $step,
            'documents' => $documents
        ]);
    }

    public function registerMerchant(Request $request)
    {  
        $request->validate([
            'logo' => ['required', File::image()],
            'company_name' => ['required'],
            'address' => ['required'],
            'mobile_number' => ['required'],
        ]);

        $merchant = Merchant::create([
            'user_id' => auth()->user()->id,
            'name' => $request->company_name,
            'address' => $request->address,
            'mobile_no' => $request->mobile_number,
            'logo' => 'NA',
            'logo_url' => 'NA',
            'is_validated' => false
        ]);

        if ($request->hasFile('logo')) {
            
            $file = $request->file('logo');
            $fileName = $file->getClientOriginalName();
            
            // Save category image
            $imagePath = $file->storeAs('public/files/merchants/'.$merchant->uuid.'/logo', $fileName);

            $merchant->update([
                'logo' => $fileName,
                'logo_url' => $imagePath
            ]);
        }

        $merchant->step()->create([
            'step' => MerchantStep::DOCUMENTATION
        ]);

        return Redirect::route('merchant-registration.index', MerchantStep::DOCUMENTATION);
    }

    public function uploadDocuments(Request $request, Merchant $merchant)
    {
        $request->validate([
            'file' => ['required']
        ]);

        $merchant->documents()->create([
            'document' => 'NA',
            'document_url' => 'NA',
            'notes' => $request->note,
            'status_id' => Status::PENDING
        ]);

        if ($request->hasFile('file')) {
            
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            
            // Save category image
            $path = $file->storeAs('public/files/merchants/'.$merchant->uuid.'/documents', $fileName);

            $merchant->documents()->update([
                'document' => $fileName,
                'document_url' => $path
            ]);
        }

        return Redirect::route('merchant-registration.index', MerchantStep::DOCUMENTATION);
    }   
}
