<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Redirect;

use App\Models\Role;
class ValidateMerchant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->role_id === Role::IS_USER && $request->user()->is_merchant) 
        {
            
            if (empty($request->user()->merchant)) 
            {
                return Redirect::route('merchant-registration.index');
            }
            
            if (!empty($request->user()->merchant) 
                && !$request->user()->merchant->is_validated
                ) 
            {
                $step = $request->user()->merchant->step->step;
                return Redirect::route('merchant-registration.index', $step);
            }

        }

        if($request->user()->role_id === Role::IS_USER && !$request->user()->is_merchant)
        {
            return Redirect::route('index');
        }

        return $next($request);
    }

    
}
