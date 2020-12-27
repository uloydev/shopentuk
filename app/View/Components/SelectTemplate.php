<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectTemplate extends Component
{

    public $label, $id, $name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $id, $name)
    {
        $this->label = $label;
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.select-template');
    }
}
