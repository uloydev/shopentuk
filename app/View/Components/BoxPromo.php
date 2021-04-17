<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BoxPromo extends Component
{

    public $heading;
    public $subheading;
    public $subheadClass;
    public $primaryBtnText;
    public $primaryBtnLink;
    public $primaryBtnType;
    public $addedClass;
    public $headingHelp;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $heading, 
        $subheading, 
        $subheadClass, 
        $primaryBtnText = null, 
        $primaryBtnLink = null, 
        $primaryBtnType = null, 
        $addedClass = null,
        $headingHelp = null
    ) {
        $this->heading = $heading;
        $this->headingHelp = $headingHelp;
        $this->subheading = $subheading;
        $this->subheadClass = $subheadClass;
        $this->primaryBtnText = $primaryBtnText;
        $this->primaryBtnLink = $primaryBtnLink;
        $this->primaryBtnType = $primaryBtnType;
        $this->addedClass = $addedClass;
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
