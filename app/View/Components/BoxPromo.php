<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BoxPromo extends Component
{

    public $heading;
    public $subheading;
    public $primaryBtnText;
    public $primaryBtnLink;
    public $primaryBtnType;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($heading, $subheading, $primaryBtnText, $primaryBtnLink, $primaryBtnType)
    {
        $this->heading = $heading;
        $this->subheading = $subheading;
        $this->primaryBtnText = $primaryBtnText;
        $this->primaryBtnLink = $primaryBtnLink;
        $this->primaryBtnType = $primaryBtnType;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.box-promo');
    }
}
