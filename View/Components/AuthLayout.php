<?php

namespace OctopusOsc\AdminLayout\View\Components;

use Illuminate\View\Component;

class AuthLayout extends Component
{
    const PREFIX = "admin";

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('admin::auth.layout', ['comment' => 'Sign-in', 'wrapperClass' => 'w-lg-500px']);
    }
}
