<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModalTemplate extends Component
{

    public $id, $formTarget, $titleModal;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $formTarget = '', $titleModal = '')
    {
        $this->id = $id;
        $this->formTarget = $formTarget;
        $this->titleModal = $titleModal;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.modal-template');
    }
}
