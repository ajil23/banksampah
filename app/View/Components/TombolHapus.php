<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TombolHapus extends Component
{
    public $alert;
    public $route;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($alert, $route)
    {
        $this->alert = $alert;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tombol-hapus');
    }
}
