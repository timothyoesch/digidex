<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public $card;
    public $fields;
    /**
     * Create a new component instance.
     */
    public function __construct($card, string $fields)
    {
        $this->card = $card;
        $this->fields = explode(",",$fields);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
