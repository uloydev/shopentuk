<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type)
    {
        switch ($type) {
            case 'success':
                $this->type = 'bg-green-600';
                break;
            
            default:
                $this->type = 'bg-red-600';
                break;
        }
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
