<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MenuStandar extends Component
{

    public $text;
    public $to;
    public $id;
    public $haveIcon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text, $to, $id, $haveIcon)
    {
        $this->text = $text;
        $this->to = $to;
        $this->id = $id;
        $this->haveIcon = $haveIcon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.menu-standar');
    }
}
