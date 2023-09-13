<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProgrammingLanguage;
use App\Models\UserProgrammingLanguage;

class ProgrammingLanguageIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = "";
    public $paginationNumber = 10;
    public $orderBy = "desc";
    public $editClicked = false;

    protected $listeners = [
        'programmingLanguageCreated' => 'handleProgrammingLanguageCreated',
        'programmingLanguageUpdated' => 'handleProgrammingLanguageUpdated',
    ];

    public function render()
    {
        $programmingLanguages = ProgrammingLanguage::where('name', 'like', "%{$this->search}%")->with('users')->orderBy('id', $this->orderBy)->paginate($this->paginationNumber);
        return view('livewire.programming-language-index', [
            'programming_languages' => $programmingLanguages,
        ]);
    }

    public function getProgrammingLanguage($id)
    {
        $this->editClicked = true;
        $this->emit('getProgrammingLanguage', ProgrammingLanguage::find($id));
    }

    public function handleProgrammingLanguageCreated()
    {
        session()->flash('message', '🎉🎉🎉 Programming Language created successfully!');
    }

    public function handleProgrammingLanguageUpdated()
    {
        session()->flash('message', '🎉🎉🎉 Programming Language updated successfully!');
        $this->editClicked = false;
    }

    public function deleteProgrammingLanguage($id)
    {
        if ($id) {
            UserProgrammingLanguage::where('programming_language_id', $id)->delete();
            ProgrammingLanguage::where('id', $id)->delete();
            session()->flash('message', ' 🎉🎉🎉 Programming Language deleted successfully!');
        }
    }
}
