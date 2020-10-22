<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MenuHasNestedChild extends Component
{

    public $text;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text)
    {
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.menu-has-nested-child');
    }
}
