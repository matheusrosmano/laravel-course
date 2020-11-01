<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Navbar extends Component
{
    public $current;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($current)
    {
        $this->current = $current;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.navbar');
    }
}
