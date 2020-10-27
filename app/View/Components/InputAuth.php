<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputAuth extends Component
{

    public $labelText, $inputName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($labelText, $inputName)
    {
        $this->labelText = $labelText;
        $this->inputName = $inputName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.input-auth');
    }
}
