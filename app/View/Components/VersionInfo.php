<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class VersionInfo extends Component
{
    public $version;
    public $buildDate;

    public function __construct($version = '1.1', $buildDate = '20-03-2025')
    {
        $this->version = $version;
        $this->buildDate = $buildDate;
    }

    public function render()
    {
        return view('components.version-info');
    }
}
