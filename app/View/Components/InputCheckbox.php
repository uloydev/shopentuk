<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputCheckbox extends Component
{
    public $label, $name, $id, $value, $isChecked, $isRequired;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $label,
        $name,
        $isChecked = false,
        $isRequired = false,
        $id = '',
        $value = ''
    ) {
        $this->label = $label;
        $this->name = $name;
        $this->id = $id;
        $this->value = $value;
        $this->isChecked = $isChecked;
        $this->isRequired = $isRequired;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.input-checkbox');
    }
}
