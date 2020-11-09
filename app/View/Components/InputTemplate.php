<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputTemplate extends Component
{

    public $id, $label, $type, $name, $placeholder;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $label, $type, $name, $placeholder)
    {
        $this->id = $id;
        $this->label = $label;
        $this->type = $type;
        $this->name = $name;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.input-template');
    }
}
