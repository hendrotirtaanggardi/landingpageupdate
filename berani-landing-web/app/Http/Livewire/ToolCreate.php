<?php

namespace App\Http\Livewire;

use App\Models\Tool;
use Livewire\Component;

class ToolCreate extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.tool-create');
    }

    public function create()
    {
        $this->validate([
            'name' => ['required'],
        ]);
        Tool::create([
            'name' => $this->name,
        ]);
        $this->resetInputFields();
        $this->emit('toolCreated');
    }

    private function resetInputFields()
    {
        $this->name = null;
    }
}
