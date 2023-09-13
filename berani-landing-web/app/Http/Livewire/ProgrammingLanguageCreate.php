<?php

namespace App\Http\Livewire;

use App\Models\ProgrammingLanguage;
use Livewire\Component;

class ProgrammingLanguageCreate extends Component
{
    public $name;

    public function render()
    {
        return view('livewire.programming-language-create');
    }

    public function create()
    {
        $this->validate([
            'name' => ['required'],
        ]);
        ProgrammingLanguage::create([
            'name' => $this->name,
        ]);
        $this->resetInputFields();
        $this->emit('programmingLanguageCreated');
    }

    private function resetInputFields()
    {
        $this->name = null;
    }
}
