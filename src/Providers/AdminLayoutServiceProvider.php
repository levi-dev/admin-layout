<?php

namespace OctopusOsc\AdminLayout\Providers;

use Illuminate\Support\ServiceProvider;
use OctopusOsc\Core\Commands\ModuleListCommand;
use OctopusOsc\Core\Commands\ModuleSetupCommand;

class AdminLayoutServiceProvider extends ServiceProvider
{
    protected $composer = null;
    protected $classes = [];

    public function __construct($app)
    {
        $this->composer = null;
        $this->classes = [];
        $this->composer = require base_path('/vendor/autoload.php');
        if (false === empty($this->composer)) {
            $this->classes = array_keys($this->composer->getClassMap());
        }
        parent::__construct($app);
    }

    public function boot()
    {
        $classes = $this->getClassesByNamespace("OctopusOsc\AdminLayout\View\Components");
        $this->loadViewComponentsAs('al', $classes);
    }

    public function register()
    {
        $this->loadRoutesFrom(__DIR__ . "/../routes/web.php");
        $this->loadViewsFrom(__DIR__ . "/../resources/views", "admin-layout");
        $path = __DIR__ . "/../resources/assets";
        $this->publishes([$path => $this->getAssetsPath()], "admin-layout");

    }

    /**
     * @return string
     */
    protected function getAssetsPath(): string
    {
        return public_path() . "/assets";
    }

    public function getClassesByNamespace($namespace)
    {
        $classes = [];
        foreach ($this->classes as $class) {
            if (strpos($class, $namespace) === 0) {
                $classes[] = $class;
            }
        }
        return $classes;
    }
}
