<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MenuAdmin extends Component
{

    public $to, $icon, $text;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($to = '', $icon, $text)
    {
        $this->to = $to;
        $this->icon = $icon;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.menu-admin');
    }
}
