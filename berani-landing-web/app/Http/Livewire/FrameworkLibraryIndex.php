<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\FrameworkLibrary;
use App\Models\UserFrameworkLibrary;

class FrameworkLibraryIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = "";
    public $paginationNumber = 10;
    public $orderBy = "desc";
    public $editClicked = false;

    protected $listeners = [
        'frameworkLibraryCreated' => 'handleFrameworkLibraryCreated',
        'frameworkLibraryUpdated' => 'handleFrameworkLibraryUpdated',
    ];

    public function render()
    {
        $frameworkLibraries = FrameworkLibrary::where('name', 'like', "%{$this->search}%")->with('users')->orderBy('id', $this->orderBy)->paginate($this->paginationNumber);
        return view('livewire.framework-library-index', [
            'framework_libraries' => $frameworkLibraries,
        ]);
    }

    public function getFrameworkLibrary($id)
    {
        $this->editClicked = true;
        $this->emit('getFrameworkLibrary', FrameworkLibrary::find($id));
    }

    public function handleFrameworkLibraryCreated()
    {
        session()->flash('message', '🎉🎉🎉 Framework/Library created successfully!');
    }

    public function handleFrameworkLibraryUpdated()
    {
        session()->flash('message', '🎉🎉🎉 Framework/Library updated successfully!');
        $this->editClicked = false;
    }

    public function deleteFrameworkLibrary($id)
    {
        if ($id) {
            UserFrameworkLibrary::where('framework_library_id', $id)->delete();
            FrameworkLibrary::where('id', $id)->delete();
            session()->flash('message', ' 🎉🎉🎉 Framework/Library deleted successfully!');
        }
    }
}
