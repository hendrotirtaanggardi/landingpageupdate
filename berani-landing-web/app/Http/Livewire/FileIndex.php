<?php

namespace App\Http\Livewire;

use App\Models\UserFile;
use Livewire\Component;
use Livewire\WithPagination;

class FileIndex extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $paginationNumber = 10;
    public $orderBy = "desc";
    public $deleteFileClicked = false;

    protected $listeners = [
        'fileDeleted' => 'handleFileDeleted',
        'cancelDeleteFile' => 'handleCancelDeleteFile',
    ];

    public function render()
    {
        return view('livewire.file-index', [
            'files' => UserFile::orderBy('id', $this->orderBy)->paginate($this->paginationNumber)
        ]);
    }

    public function clickDeleteFile($talentId, $fileId)
    {
        $this->deleteFileClicked = true;
        $this->emit('getTalentFile', $talentId, $fileId);
    }

    public function handleFileDeleted()
    {
        session()->flash('success', '🎉🎉🎉 Talent file deleted successfully!');
        $this->deleteFileClicked = false;
    }

    public function handleCancelDeleteFile()
    {
        $this->deleteFileClicked = false;
    }

    public function download($userId, $fileName)
    {
        return response()->download('storage/dropzone/' . $userId . '/' . $fileName);
    }
}
