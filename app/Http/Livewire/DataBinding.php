<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DataBinding extends Component
{
    public  $msg;

    public function render()
    {
        return view('livewire.data-binding');
    }
}
