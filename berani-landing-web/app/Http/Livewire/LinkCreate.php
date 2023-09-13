<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Link;

class LinkCreate extends Component
{
    public $nameLink;
    public $addressLink;

    public function render()
    {
        return view('livewire.link-create');
    }

    public function storeLink()
    {
        $this->validate([
            'nameLink' => ['required', 'min:3', 'alpha_dash'],
            'addressLink' => ['required', 'url']
        ]);

        $link = Link::create([
            'user_id' => auth()->user()->id,
            'name' => $this->nameLink,
            'address' => $this->addressLink,
            'slug' => $this->nameLink
        ]);

        $this->resetInput();

        $this->emit('linkStore', $link);
    }

    private function resetInput()
    {
        $this->nameLink = null;
        $this->addressLink = null;
    }
}
