<?php

namespace App\Http\Livewire;

use App\Models\ProgrammingLanguage;
use Livewire\Component;

class ProgrammingLanguageUpdate extends Component
{

    public $programmingLanguageId;
    public $name;

    protected $listeners = [
        'getProgrammingLanguage' => 'showProgrammingLanguage'
    ];

    public function render()
    {
        return view('livewire.programming-language-update');
    }

    public function showProgrammingLanguage($programmingLanguage)
    {
        $this->programmingLanguageId = $programmingLanguage['id'];
        $this->name = $programmingLanguage['name'];
    }

    public function update()
    {
        $this->validate([
            'name' => ['required'],
        ]);

        if ($this->programmingLanguageId) {
            ProgrammingLanguage::where('id', $this->programmingLanguageId)->update([
                'name' => $this->name,
            ]);
        }

        $this->resetInputFields();
        $this->emit('programmingLanguageUpdated');
    }

    private function resetInputFields()
    {
        $this->name = null;
    }
}
