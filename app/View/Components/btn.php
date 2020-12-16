<?php

namespace App\View\Components;

use Illuminate\View\Component;

class btn extends Component
{

    public $text, $action, $addClass;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text, $action = '', $addClass = '')
    {
        $this->text = $text;
        $this->action = $action;
        $this->addClass = $addClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.btn');
    }
}
