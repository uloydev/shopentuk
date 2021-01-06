<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputTemplate extends Component
{

    public $id, $label, $type, $name, $placeholder, $addClass;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id = '', $label, $type = 'text', $name, $placeholder, $addClass = '')
    {
        $this->id = $id;
        $this->label = $label;
        $this->type = $type;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->addClass = $addClass;
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
