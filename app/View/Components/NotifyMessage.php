<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NotifyMessage extends Component
{
    public $on;
    public $type;
    public $message;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($on, $type, $message)
    {
        $this->on = $on;
        $this->type = $type;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.notify-message');
    }
}
