<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardProduct extends Component
{

    public $productImg, $productName, $productOriginalPrice, $productFinalPrice;
    public $productRating, $productCategory, $productIsObral, $isHorizontal, $link;
    public $isDigitalProduct, $productCategoryId, $productPointPrice, $isTokoPoint;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $productImg,
        $productName,
        $productOriginalPrice = null,
        $productFinalPrice = null, 
        $productPointPrice = null,
        $productRating,
        $productCategory,
        $productCategoryId,
        $productIsObral,
        $isHorizontal = null,
        $isDigitalProduct = false,
        $isTokoPoint = false
    ) {
        $this->productImg = $productImg;
        $this->productName = $productName;
        $this->productOriginalPrice = $productOriginalPrice;
        $this->productFinalPrice = $productFinalPrice;
        $this->productPointPrice = $productPointPrice;
        $this->productRating = $productRating;
        $this->productCategory = $productCategory;
        $this->productCategoryId = $productCategoryId;
        $this->productIsObral = $productIsObral;
        $this->isHorizontal = $isHorizontal;
        $this->isDigitalProduct = $isDigitalProduct;
        $this->isTokoPoint = $isTokoPoint;
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
