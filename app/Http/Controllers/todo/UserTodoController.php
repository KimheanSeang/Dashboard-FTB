<?php

namespace App\Http\Controllers\todo;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\TrashTask;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTodoController extends Controller
{
    public function UserTask()
    {
        // Fetch the currently logged-in user
        $user = Auth::user();

        // Fetch tasks assigned to the logged-in user
        $usertasks = Task::where('user_task', $user->name)->latest()->get();

        return view('backend.todo.user_task', ['usertasks' => $usertasks]);
    }
    public function RemoveTask($id)
    {
        $task = Task::findOrFail($id);

        // Move the task to trash_tasks table
        $trashTask = new TrashTask();
        $trashTask->title = $task->title;
        $trashTask->user_task = $task->user_task;
        $trashTask->description = $task->description;
        $trashTask->status = $task->status;
        $trashTask->process = $task->process;
        $trashTask->create_by = $task->create_by;

        $trashTask->save();

        // Delete the task from todo_tasks table
        $task->delete();

        // Redirect back with success message
        $notification = [
            'message' => 'Task moved to trash successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('user.todo')->with($notification);
    }


    public function UserChanges(Request $request)
    {
        // Check if task_ids is not null and is an array
        if (!empty($request->task_ids) && is_array($request->task_ids)) {
            foreach ($request->task_ids as $taskId => $status) {
                // Find the task by ID
                $task = Task::findOrFail($taskId);

                // Update status based on the checkbox value
                $task->status = $status == '1' ? 'Done' : 'In-Process';

                // Update process based on the selected option in the dropdown menu
                $task->process = $request->input('status_' . $taskId);

                // Save the updated task data
                $task->save();
            }
        }

        // Redirect back with success message
        $notification = [
            'message' => 'Tasks saved successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('user.todo')->with($notification);
    }

    // public function ShowTask($id)
    // {
    //     $task = Task::findOrFail($id);
    //     $users = User::all(); // Fetch users to populate the select dropdown
    //     return view('backend.todo.show_user_task', compact('task', 'users'));
    // }
}
