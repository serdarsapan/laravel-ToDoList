<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{

    public function delete(Task $task)
    {
        // Deleting the Task
        $task->delete();

        return redirect('/');
    }
    
}
