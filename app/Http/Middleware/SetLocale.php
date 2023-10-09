<?php

namespace App\Http\Middleware;

use Closure;

class SetLocale
{
 
    public function handle($request, Closure $next)
{// استلام اللغة من القائمه المنسدله
    $selectedLanguage = $request->query('change_language');
    
    if (in_array($selectedLanguage, array_keys(config('panel.available_languages')))) {
        session(['app_locale' => $selectedLanguage]); // حفظ اللغه كلغة نشطة حاليًا للبرنامج عشان ما تتغير عند تبديل الصفحه
        app()->setLocale($selectedLanguage);
    } elseif (session('app_locale')) {
        app()->setLocale(session('app_locale'));
    }
    
    return $next($request);
}

    
    
}
