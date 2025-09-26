<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * O caminho para onde os usuários são redirecionados após o login.
     */
    public const HOME = '/dashboard'; // Alterado para Dashboard

    /**
     * Define as rotas do aplicativo.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configuração de rate limiting (não precisa alterar)
     */
    protected function configureRateLimiting(): void
    {
        //
    }
}
