<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LoanTable extends Component
{
    public $loans;
    /**
     * Create a new component instance.
     */
    public function __construct($loans)
    {
        $this->loans = $loans;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.loan-table');
    }
}
