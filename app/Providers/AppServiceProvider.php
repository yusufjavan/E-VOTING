<?php

namespace App\Providers;

use App\Repositories\Dummy\DummyHasilSuaraRepository;
use App\Repositories\Dummy\DummyKandidatRepository;
use App\Repositories\Dummy\DummyPemilihRepository;
use App\Repositories\Dummy\DummyPengaturanRepository;
use App\Repositories\Dummy\DummyPengumumanRepository;
use App\Repositories\HasilSuaraRepository;
use App\Repositories\KandidatRepository;
use App\Repositories\PemilihRepository;
use App\Repositories\PengaturanRepository;
use App\Repositories\PengumumanRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(KandidatRepository::class, DummyKandidatRepository::class);
        $this->app->bind(PemilihRepository::class, DummyPemilihRepository::class);
        $this->app->bind(PengaturanRepository::class, DummyPengaturanRepository::class);
        $this->app->bind(PengumumanRepository::class, DummyPengumumanRepository::class);
        $this->app->bind(HasilSuaraRepository::class, DummyHasilSuaraRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
