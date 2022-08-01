<?php

namespace OctopusOsc\AdminLayout\Providers;

use Illuminate\Support\ServiceProvider;
use OctopusOsc\Core\Commands\ModuleListCommand;
use OctopusOsc\Core\Commands\ModuleSetupCommand;

class AdminLayoutServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        $this->loadRoutesFrom(__DIR__ . "/../routes/web.php");
        $this->loadViewsFrom(__DIR__ . "/../resources/views", "admin-layout");
        $path = __DIR__ . "/../resources/assets";
//        $this->publishes([$this->getAssetsPath() => __DIR__ . "/../resources/assets"], "admin-layout");
        $this->publishes([$this->getAssetsPath() => $path], "admin-layout");
    }

    /**
     * @return string
     */
    protected function getAssetsPath(): string
    {
        return public_path();
    }
}
