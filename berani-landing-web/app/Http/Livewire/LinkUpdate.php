<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Link;

class LinkUpdate extends Component
{
    public $links;
    public $linkId;
    public $nameLink;
    public $addressLink;

    protected $listeners = [
        "getLink" => 'handleLink'
    ];

    public function render()
    {
        return view('livewire.link-update', [
            'links' => Link::all()
        ]);
    }

    public function handleLink($link)
    {
        $this->linkId = $link['id'];
        $this->nameLink = $link['name'];
        $this->addressLink = $link['address'];
    }

    public function updateLink()
    {
        $validatedData = $this->validate([
            'addressLink' => ['required', 'url']
        ]);

        $link = Link::find($this->linkId);
        $link->update($validatedData);

        $this->resetInput();

        $this->emit('linkUpdate', $link);
    }

    private function resetInput()
    {
        $this->nameLink = null;
        $this->addressLink = null;
    }
}
