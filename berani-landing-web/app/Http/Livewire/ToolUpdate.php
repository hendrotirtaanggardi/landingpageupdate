<?php

namespace App\Http\Livewire;

use App\Models\Tool;
use Livewire\Component;

class ToolUpdate extends Component
{

    public $toolId;
    public $name;

    protected $listeners = [
        'getTool' => 'showTool'
    ];

    public function render()
    {
        return view('livewire.tool-update');
    }

    public function showTool($tool)
    {
        $this->toolId = $tool['id'];
        $this->name = $tool['name'];
    }

    public function update()
    {
        $this->validate([
            'name' => ['required'],
        ]);

        if ($this->toolId) {
            Tool::where('id', $this->toolId)->update([
                'name' => $this->name,
            ]);
        }

        $this->resetInputFields();
        $this->emit('toolUpdated');
    }

    private function resetInputFields()
    {
        $this->name = null;
    }
}
