<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BtnPrimary extends Component
{

    public $text, $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text, $type = 'submit')
    {
        $this->text = $text;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.btn-primary');
    }
}
