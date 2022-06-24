<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\{
    ProductRepositoryInterface,
    BrandRepositoryInterface,
    CategoryRepositoryInterface,
    SupplierRepositoryInterface};
use App\Models\Producto;
use App\Observers\ProductoObserver;
use App\Repositories\{
    ProductRepository,
    BrandRepository,
    CategoryRepository,
    SupplierRepository};

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
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(BrandRepositoryInterface::class, BrandRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(SupplierRepositoryInterface::class, SupplierRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //TODO: Observadores
        /* Producto::observe(ProductObserver::class); */
    }
}
