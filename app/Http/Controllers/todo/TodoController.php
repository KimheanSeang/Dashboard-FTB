<?php

namespace App\Http\Controllers\todo;

use App\Exports\AllTaskExport;
use App\Exports\TrashTaskExport;
use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\TrashTask;
use App\Models\User;
use Illuminate\Http\Request;


class TodoController extends Controller
{
    public function AllTodo()
    {
        $users = User::all();
        $alltask = Task::latest()->get();
        return view('backend.todo.all_todo', ['alltask' => $alltask], compact('users'));
    }
    public function AddTodo()
    {

        $users = User::all();
        return view('backend.todo.add_todo', compact('users'));
    }
    public function EditTodo($id)
    {
        $task = Task::findOrFail($id);
        $users = User::all(); // Fetch users to populate the select dropdown
        return view('backend.todo.edit_task', compact('task', 'users'));
    }


    public function UpdateTask(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'user_task' => 'required',
        ]);

        // Find the task by ID
        $task = Task::findOrFail($id);

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
            'message' => 'Task updated successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.todo')->with($notification);
    }

    public function StoreTask(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'user_task' => 'required',
        ]);

        // Create a new ChatData instance
        $taskData = new Task();
        $taskData->title = $request->input('title');
        $taskData->user_task = $request->input('user_task');
        $taskData->description = strip_tags($request->description);

        // Save the chat data
        $taskData->save();
        $notification = array(
            'message' => 'Task Created Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.todo')->with($notification);
    }
    public function deleteTask($id)
    {
        // Find the task by ID
        $task = Task::findOrFail($id);

        // Move the task to trash_tasks table
        $trashTask = new TrashTask();
        $trashTask->title = $task->title;
        $trashTask->user_task = $task->user_task;
        $trashTask->description = $task->description;
        $trashTask->status = $task->status;
        $trashTask->process = $task->process;
        $trashTask->save();

        // Delete the task from todo_tasks table
        $task->delete();

        // Redirect back with success message
        $notification = [
            'message' => 'Task moved to trash successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.todo')->with($notification);
    }


    public function showTrash()
    {
        $trashTasks = TrashTask::all();
        return view('backend.todo.all_todo', ['alltask' => $trashTasks]); // Assuming 'all_todo' is the view for both all tasks and trash tasks
    }
    public function recoverTask($id)
    {
        // Find the task in the trash_task table by ID
        $trashTask = TrashTask::findOrFail($id);

        // Create a new task in the todo_task table
        $task = new Task();
        $task->title = $trashTask->title;
        $task->user_task = $trashTask->user_task;
        $task->description = $trashTask->description;
        $task->status = $trashTask->status;
        $task->process = $trashTask->process;
        $task->save();

        // Delete the task from the trash_task table
        $trashTask->delete();

        // Redirect back with success message
        $notification = [
            'message' => 'Task recovered successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('trash.todo')->with($notification);
    }
    public function permanentDeleteTask($id)
    {
        // Find the task in the trash_task table by ID
        $trashTask = TrashTask::findOrFail($id);

        // Delete the task from the trash_task table permanently
        $trashTask->delete();

        // Redirect back with success message
        $notification = [
            'message' => 'Task permanently deleted',
            'alert-type' => 'success',
        ];

        return redirect()->route('trash.todo')->with($notification);
    }


    public function saveChanges(Request $request)
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

        if (!empty($request->importance) && is_array($request->importance)) {
            foreach ($request->importance as $taskId => $importance) {
                // Find the task by ID
                $task = Task::findOrFail($taskId);

                // Update importance based on the checkbox value
                $task->imp = $importance === 'important' ? 'important' : 'none';

                // Save the updated task data
                $task->save();
            }
        }

        // Redirect back with success message
        $notification = [
            'message' => 'Tasks saved successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('all.todo')->with($notification);
    }
}
