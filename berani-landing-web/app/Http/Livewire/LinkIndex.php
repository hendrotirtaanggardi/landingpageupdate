<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Link;

class LinkIndex extends Component
{
    public $statusUpdate = false;

    protected $listeners = [
        'linkUpdate' => 'handleUpdate',
        'linkStore' => 'handleStore'
    ];

    public function render()
    {
        return view('livewire.link-index', [
            'links' => Link::all()
        ]);
    }

    public function getLink($id)
    {
        $this->statusUpdate = true;
        $link = Link::find($id);
        $this->emit('getLink', $link);
    }

    public function handleUpdate()
    {
        $statusUpdate = false;
    }

    public function handleStore($link)
    {
        session()->flash('store', 'Link ' . $link['name'] . ' successfully added');
    }

    public function delete($id)
    {
        Link::where('id', $id)->delete();
        session()->flash('delete', 'Link has been deleted!');
    }
}
