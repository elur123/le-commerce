<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Models\DocumentValidation;
class DocumentValidationController extends Controller
{
    
    public function updateStatus(DocumentValidation $document, $status)
    {
        $document->update([
            'status_id' => $status
        ]);

        return Redirect::back();
    }
}
