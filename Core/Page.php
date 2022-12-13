<?php

namespace OctopusOsc\AdminLayout\Core;

use OctopusOsc\AdminLayout\Core\Adapters\Container;

class Page
{
    protected $container;
    const PREFIX = "OctopusOsc_AdminLayout";
    protected static $containers = [];

    public function addContainer($container)
    {
        self::$containers [] = $container;
        return $this;
    }

    public function execute()
    {
        $con = self::$containers;
        $view = 'base';
        return view(self::PREFIX . '::' . 'pages.' . $view, ["containers" => self::$containers]);
    }
}
