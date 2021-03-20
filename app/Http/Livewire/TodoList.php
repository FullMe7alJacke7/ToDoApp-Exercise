<?php

namespace App\Http\Livewire;

use Illuminate\Support\Collection;
use Livewire\Component;

class TodoList extends Component
{
    public $input = "";
    public $tasksToDo = [];
    public $tasksComplete = [];

    public function taskAdded()
    {
        if(strlen($this->input) <= 0)
            return;

        $task = array(
            'name' => $this->input,
            'completed' => false
        );

        array_push($this->tasksToDo, $task);
        $this->input = "";
    }

    public function taskCompleted($name, $index)
    {
        $task = [];
        $task['name'] = $name;
        $task['completed'] = true;
        array_push($this->tasksComplete, $task);
        array_splice($this->tasksToDo, $index, 1);
    }

    public function clearTasks()
    {
        $this->tasksToDo = [];
        $this->tasksComplete = [];
    }

    public function render()
    {
        return view('livewire.todo-list');
    }
}
