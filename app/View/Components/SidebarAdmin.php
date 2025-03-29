<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarAdmin extends Component
{
    public function render()
    {
        return view('components.sidebar-admin');
    }
}