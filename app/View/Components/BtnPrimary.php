<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BtnPrimary extends Component
{

    public $text, $type, $addClass;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text, $type = 'submit', $addClass = '')
    {
        $this->text = $text;
        $this->type = $type;
        $this->addClass = $addClass;
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
