<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // === which tab is currentlt Active or not in CRUD operation
        $currentRoute = request()->route()->getName();
        // dd($currentRoute);
        return view('components.sidebar', ['currentRoute'=>$currentRoute]);
    }
}
