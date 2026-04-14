<?php

namespace App\Http\Controllers\Locale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ToggleLocaleController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Validate and set the locale, defaulting to 'en' if not allowed
        $locale = in_array($request->input('locale'), ['en', 'fr'])
            ? $request->input('locale')
            : 'en';

        // Store the locale in the session
        session(['locale' => $locale]);

        // Optionally set the application locale immediately
        App::setLocale($locale);

        // Return a JSON response
        return response()->json([
            'success' => true,
            'locale' => $locale
        ]);
    }
}
