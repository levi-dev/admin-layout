<?php

namespace OctopusOsc\AdminLayout\Providers;

use Illuminate\Support\ServiceProvider;
use OctopusOsc\Core\Commands\ModuleListCommand;
use OctopusOsc\Core\Commands\ModuleSetupCommand;

class AppServiceProvider extends ServiceProvider
{
    const PREFIX = "admin";
    
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
        $this->loadViewComponentsAs(self::PREFIX, $classes);
    }

    public function register()
    {
    }
}
