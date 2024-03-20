<?php

namespace App\Http\Controllers\todo;

use App\Http\Controllers\Controller;
use App\Models\CheckTask;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class CheckTaskController extends Controller
{
    public function CheckTask()
    {
        $users = User::all();
        $checktask = CheckTask::latest()->get();
        return view('backend.todo.check_task', ['checktask' => $checktask], compact('users'));
    }

    public function CheckChanges(Request $request)
    {
        // Check if task_ids is not null and is an array
        if (!empty($request->task_ids) && is_array($request->task_ids)) {
            foreach ($request->task_ids as $taskId => $status) {
                // Find the task by ID
                $task = CheckTask::findOrFail($taskId);

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

        return redirect()->route('check.todo')->with($notification);
    }

    public function DeleteCheckTask($id)
    {
        // Find the task in the trash_task table by ID
        $checktask = CheckTask::findOrFail($id);

        // Delete the task from the trash_task table permanently
        $checktask->delete();

        // Redirect back with success message
        $notification = [
            'message' => 'Task Successfully deleted',
            'alert-type' => 'success',
        ];

        return redirect()->route('check.todo')->with($notification);
    }





    public function EditCheckTask($id)
    {
        $task = CheckTask::findOrFail($id);
        $users = User::all(); // Fetch users to populate the select dropdown
        return view('backend.todo.edit_check_task', compact('task', 'users'));
    }


    public function UpdateCheckTask(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'user_task' => 'required',
        ]);

        // Find the task by ID
        $task = CheckTask::findOrFail($id);

        // Find the user by ID
        $user = User::findOrFail($request->input('user_task'));

        // Update the task properties
        $task->title = $request->input('title');
        $task->user_task = $user->name;
        $task->description = strip_tags($request->input('description'));
        // $task->description = $request->description;
        $task->save();

        // Redirect back with success message
        $notification = [
            'message' => 'Task Update successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('check.todo')->with($notification);
    }

    public function ApproveTask($id)
    {
        // Retrieve the file details before deleting
        $taskData = CheckTask::findOrFail($id);

        // Store the file details in the recovery table
        Task::create([
            'title' => $taskData->title,
            'user_task' => $taskData->user_task,
            'description' => $taskData->description,
        ]);

        // Now, delete the file
        $taskData->delete();

        $notification = [
            'message' => 'Check Task Approved Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }
}
