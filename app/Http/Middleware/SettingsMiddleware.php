<?php

namespace App\Http\Middleware;

use Closure;
use App\GlobalConfig;

class SettingsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->loadSettings();

        return $next($request);
    }

    public function loadSettings()
    {
        $globalConfigs = GlobalConfig::pluck('valor', 'nome');

        view()->share(compact('globalConfigs'));
    }
}
