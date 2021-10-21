<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Field;

class clientLayout extends Component
{
    public $cssfile;
    public $fields;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cssfile)
    {
        $this->cssfile = $cssfile;
        $this->fields = Field::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('client.layout');
    }
}
