<?php

namespace App\Http\Livewire;

use App\Models\Tool;
use Livewire\Component;
use App\Models\UserTool;
use Livewire\WithPagination;

class ToolIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = "";
    public $paginationNumber = 10;
    public $orderBy = "desc";
    public $editClicked = false;

    protected $listeners = [
        'toolCreated' => 'handleToolCreated',
        'toolUpdated' => 'handleToolUpdated',
    ];

    public function render()
    {
        $tools = Tool::where('name', 'like', "%{$this->search}%")->with('users')->orderBy('id', $this->orderBy)->paginate($this->paginationNumber);
        return view('livewire.tool-index', [
            'tools' => $tools,
        ]);
    }

    public function getTool($id)
    {
        $this->editClicked = true;
        $this->emit('getTool', Tool::find($id));
    }

    public function handleToolCreated()
    {
        session()->flash('message', '🎉🎉🎉 Tool created successfully!');
    }

    public function handleToolUpdated()
    {
        session()->flash('message', '🎉🎉🎉 Tool updated successfully!');
        $this->editClicked = false;
    }

    public function deleteTool($id)
    {
        if ($id) {
            UserTool::where('tool_id', $id)->delete();
            Tool::where('id', $id)->delete();
            session()->flash('message', ' 🎉🎉🎉 Tool deleted successfully!');
        }
    }
}
