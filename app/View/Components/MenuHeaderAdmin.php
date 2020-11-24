<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MenuHeaderAdmin extends Component
{

    public $text, $to, $icon, $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text, $to, $icon, $id = null)
    {
        $this->text = $text;
        $this->to = $to;
        $this->icon = $icon;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.menu-header-admin');
    }
}
