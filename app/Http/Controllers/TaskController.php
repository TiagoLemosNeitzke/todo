<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Models\Task;
use App\Models\Team;
use App\Traits\NotificationTrait;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    use NotificationTrait;
    public function create()
    {
        return view('task.create')->with(['teams' => Team::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTaskRequest $request)
    {
        Task::query()->create([
            'name' => $request->validated('name'),
            'short_description' => $request->validated('short_description'),
            'score' => $request->validated('score'),
            'uuid' => \Str::uuid(),
            'user_id' => auth()->id(),
            'team_id' => $request->validated('team_id'),
        ]);
        return $this->handleNotificationView('success', 'Task created successfully', 'dashboard');
    }
    public function destroy(Task $task)
    {
        $task->delete();
        return $this->handleNotificationView('success', 'Task deleted successfully', '/dashboard');
    }
}
