<?php

namespace App\Http\Services;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskService
{
    protected Task $model;

    public function __construct(Task $task)
    {
        $this->model = $task;
    }

    public function getAll(): Collection
    {
        return Task::all();
    }

    public function create($data)
    {
       return $this->model->create([
            'title' => $data['title'],
            'body' => $data['body'],
        ]);
    }
}
