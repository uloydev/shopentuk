<?php

namespace App\View\Components\Adminmart;

use Illuminate\View\Component;

class Alert extends Component
{

    public $isDismissable, $message, $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($isDismissable = 'false', $message, $type = 'info')
    {
        $this->isDismissable = $isDismissable;
        $this->message = $message;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.adminmart.alert');
    }
}
