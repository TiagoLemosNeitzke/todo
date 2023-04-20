<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use Livewire\WithPagination;
use phpDocumentor\Reflection\Types\Collection;

class Task extends Component
{
    use WithPagination;

    public $tasks;

    public function mount()
    {
        $this->tasks = \App\Models\Task::get();
    }
    public function render()
    {
        return view('livewire.task.task');
    }

    public function setTaskStatus($id)
    {
        $task = \App\Models\Task::find($id);
        $task->status = $task->status + 1;
        $task->save();
    }
}
