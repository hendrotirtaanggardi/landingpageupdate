<?php

namespace App\Http\Livewire;

use App\Models\FrameworkLibrary;
use App\Models\ProgrammingLanguage;
use App\Models\Tool;
use App\Models\User;
use App\Models\UserFile;
use App\Models\Content;
use Livewire\Component;
use Livewire\WithPagination;

class RecruiterIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;
    public $paginationNumber = 10;
    public $filterByProgrammingLanguage;
    public $filterByFrameworkLibrary;
    public $filterByTool;
    public $orderBy = "desc";

    public function render()
    {
        $programming_languages = json_decode($this->filterByProgrammingLanguage) ?? [];
        $framework_languages = json_decode($this->filterByFrameworkLibrary) ?? [];
        $tools = json_decode($this->filterByTool) ?? [];

        $talents = User::role('talent')->filter([
            'search' => $this->search,
            'programming_languages' => in_array("", $programming_languages) ? false : $programming_languages,
            'framework_libraries' => in_array("", $framework_languages) ? false : $framework_languages,
            'tools' => in_array("", $tools) ? false : $tools,
        ])->orderBy('id', $this->orderBy)->paginate($this->paginationNumber);

        return view('livewire.recruiter-index', [
            'talents' => $talents,
            'programmingLanguages' => ProgrammingLanguage::latest()->orderBy('name', 'asc')->get(),
            'frameworkLibraries' => FrameworkLibrary::latest()->orderBy('name', 'asc')->get(),
            'tools' => Tool::latest()->orderBy('name', 'asc')->get(),
            'files' => UserFile::latest()->get(),
            'content' => Content::latest()->get(),
        ]);
    }

    public function redirectToTalent($id)
    {
        return redirect()->route('talent.detail', ['user' => $id]);
    }
}
