<?php

namespace App\View\Components;

use Illuminate\View\Component;

class OrderItem extends Component
{

    public $orderId, $totalPoint, $totalPrice, $orderDate;
    public $orderStatus;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($orderId, $totalPoint, $totalPrice, $orderDate, $orderStatus)
    {
        $this->orderId = $orderId;
        $this->totalPoint = $totalPoint;
        $this->totalPrice = $totalPrice;
        $this->orderDate = $orderDate;
        $this->orderStatus = $orderStatus;
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
