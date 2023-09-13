<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class TalentShow extends Component
{
    public User $talent;

    public function mount(User $talent)
    {
        $this->talent = $talent;
    }

    public function render()
    {
        return view('livewire.talent-show');
    }

    public function download($userId, $fileName)
    {
        return response()->download('storage/dropzone/' . $userId . '/' . $fileName);
    }
}
