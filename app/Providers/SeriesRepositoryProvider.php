<?php

namespace App\Providers;

use App\Repositories\EloquentSeriesRepository;
use App\Repositories\SeriesRepository;
use Illuminate\Support\ServiceProvider;

class SeriesRepositoryProvider extends ServiceProvider
{
    /**
     * Da pra fazer um Provider de Repositórios e dentro desse aray informar as interfaces com suas implementações concretas
     * Adicionar também no arquivo app de configuração
     * 
     * @var array
     */
    public array $bindings = [
        SeriesRepository::class => EloquentSeriesRepository::class
    ];

    /**
     * Register services.
     * Lincando uma abstração a uma classe concreta, alternativa
     * 
     * @return void
     */
    public function register()
    {
        $this->app->bind(SeriesRepository::class, EloquentSeriesRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
