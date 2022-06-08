<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ProductoRepositoryInterface;
use App\Models\Producto;
use App\Observers\ProductoObserver;
use App\Repositories\ProductoRepository;

class RepositoryServiceProvider extends ServiceProvider
{
      /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(ProductoRepositoryInterface::class, ProductoRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //TODO: Observadores
        Producto::observe(ProductoObserver::class);
    }
}
