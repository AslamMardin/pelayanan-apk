<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Select extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public $data;
    public $caption;
    public function __construct($name, $data = [], $caption)
    {
        //
        $this->name = $name;
        $this->data = $data;
        $this->caption = $caption;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.select', [
            'data' => $this->data,
            'caption' => $this->caption
        ]);
    }
}
