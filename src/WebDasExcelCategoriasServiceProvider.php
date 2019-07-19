<?php
namespace DanielSann\WebDasExcelCategorias;

use Illuminate\Support\ServiceProvider;

class WebDasExcelCategoriasServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadMigrationsFrom(dirname(__DIR__).'/databases/migrations/2019_07_19_000001_residuotemp.php');
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
    }

    public function register()
    {

    }
}