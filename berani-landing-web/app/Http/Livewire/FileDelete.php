<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\UserFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class FileDelete extends Component
{
    public $talent;
    public $file;

    protected $listeners = [
        'getTalentFile' => 'showTalentFile'
    ];

    public function render()
    {
        return view('livewire.file-delete');
    }

    public function showTalentFile($talentId, $fileId)
    {
        $this->talent = User::role('talent')->where('id', $talentId)->first();
        $this->file = UserFile::where('id', $fileId)->first();
    }

    public function delete()
    {
        UserFile::where('id', $this->file->id)->delete();
        Storage::delete('dropzone/' . $this->talent->id . '/' . $this->file->file);
        $this->emit('fileDeleted');
    }

    public function cancelDeleteFile()
    {
        $this->emit('cancelDeleteFile');
    }
}
