<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse; // Import RedirectResponse

class owner
{
    public function handle(Request $request, Closure $next): mixed // Change the return type
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // Return RedirectResponse
        }

        $userRole = Auth::user()->route; 

        if ($userRole == 1) {
            return $next($request);
        }

        if ($userRole == 2) {
            return redirect()->route('storemanager'); // Return RedirectResponse
        }

        if ($userRole == 3) {
            return redirect()->route('warehousemanager'); // Return RedirectResponse
        }

        if ($userRole == 4) {
            return redirect()->route('driver'); // Return RedirectResponse
        }

        if ($userRole == 5) {
            return redirect()->route('customer'); // Return RedirectResponse
        }

        // Return a default response if the user role doesn't match any case
        return response()->json(['error' => 'Unauthorized'], 403); // Return JsonResponse or other response type
    }
}
