<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectByRole
{
    /**
     * Setelah login, arahkan user ke halaman sesuai role-nya.
     * Middleware ini digunakan untuk menggantikan redirect default '/dashboard'.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Hanya redirect jika response berupa redirect ke /dashboard
        if ($response instanceof \Illuminate\Http\RedirectResponse) {
            $targetUrl = $response->getTargetUrl();
            $dashboardUrl = url('/dashboard');

            if ($targetUrl === $dashboardUrl && $request->user()) {
                $user = $request->user();

                if ($user->isAdmin()) {
                    return redirect('/admin');
                }

                return redirect('/beranda');
            }
        }

        return $response;
    }
}
