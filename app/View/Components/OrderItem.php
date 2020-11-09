<?php

namespace App\View\Components;

use Illuminate\View\Component;

class OrderItem extends Component
{

    public $productName, $productPrice, $productQty, $productBoughtDate;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($productName, $productPrice, $productQty, $productBoughtDate)
    {
        $this->productName = $productName;
        $this->productPrice = $productPrice;
        $this->productQty = $productQty;
        $this->productBoughtDate = $productBoughtDate;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.order-item');
    }
}
