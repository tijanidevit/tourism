<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Paginator::useBootstrapFive();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Builder::macro('filterBy', function ($column,$value) {
            if ($value) {
                return $this->where($column, $value);
            }
            return $this;
        });

        Builder::macro('search', function ($field, $data) {
            return $data ? $this->where($field, 'like', "%$data%") : $this;
        });

        Builder::macro('orSearch', function ($field, $data) {
            return $data ? $this->orWhere($field, 'like', "%$data%") : $this;
        });
    }
}
