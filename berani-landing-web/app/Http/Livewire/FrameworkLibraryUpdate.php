<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\FrameworkLibrary;

class FrameworkLibraryUpdate extends Component
{

    public $frameworkLibraryId;
    public $name;

    protected $listeners = [
        'getFrameworkLibrary' => 'showFrameworkLibrary'
    ];

    public function render()
    {
        return view('livewire.framework-library-update');
    }

    public function showFrameworkLibrary($frameworkLibrary)
    {
        $this->frameworkLibraryId = $frameworkLibrary['id'];
        $this->name = $frameworkLibrary['name'];
    }

    public function update()
    {
        $this->validate([
            'name' => ['required'],
        ]);

        if ($this->frameworkLibraryId) {
            FrameworkLibrary::where('id', $this->frameworkLibraryId)->update([
                'name' => $this->name,
            ]);
        }

        $this->resetInputFields();
        $this->emit('frameworkLibraryUpdated');
    }

    private function resetInputFields()
    {
        $this->name = null;
    }
}
