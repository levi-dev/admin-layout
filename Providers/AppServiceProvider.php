<?php

namespace OctopusOsc\AdminLayout\Providers;

use Illuminate\Support\ServiceProvider;
use OctopusOsc\Core\Commands\ModuleListCommand;
use OctopusOsc\Core\Commands\ModuleSetupCommand;

class AppServiceProvider extends ServiceProvider
{
    const PREFIX = "OctopusOsc_AdminLayout";

    public function __construct($app)
    {
        parent::__construct($app);
    }

    public function boot()
    {
        $classes = [
            \OctopusOsc\AdminLayout\View\Components\AuthLayout::class,
            \OctopusOsc\AdminLayout\View\Components\BaseLayout::class
        ];
        
        $this->loadViewComponentsAs('admin', $classes);
        $this->loadViewsFrom(__DIR__ . "/../resources/views", self::PREFIX);
    }

    public function register()
    {
    }
}
