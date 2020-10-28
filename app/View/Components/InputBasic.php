<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputBasic extends Component
{

    public $name, $label, $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label, $type = 'text')
    {
        $this->name = $name;
        $this->label = $label;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.input-basic');
    }
}
