<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardProduct extends Component
{

    public $productImg;
    public $productName;
    public $productOriginalPrice;
    public $productFinalPrice;
    public $productRating;
    public $productCategory;
    public $productIsObral;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $productImg,
        $productName,
        $productOriginalPrice = null,
        $productFinalPrice, 
        $productRating,
        $productCategory,
        $productIsObral
    ) {
        $this->productImg = $productImg;
        $this->productName = $productName;
        $this->productOriginalPrice = $productOriginalPrice;
        $this->productFinalPrice = $productFinalPrice;
        $this->productRating = $productRating;
        $this->productCategory = $productCategory;
        $this->productIsObral = $productIsObral;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.card-product');
    }

}
