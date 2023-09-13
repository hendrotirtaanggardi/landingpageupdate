<?php

namespace App\Http\Livewire;

use App\Models\FrameworkLibrary;
use Livewire\Component;

class FrameworkLibraryCreate extends Component
{

    public $name;

    public function render()
    {
        return view('livewire.framework-library-create');
    }

    public function create()
    {
        $this->validate([
            'name' => ['required'],
        ]);
        FrameworkLibrary::create([
            'name' => $this->name,
        ]);
        $this->resetInputFields();
        $this->emit('frameworkLibraryCreated');
    }

    private function resetInputFields()
    {
        $this->name = null;
    }
}
