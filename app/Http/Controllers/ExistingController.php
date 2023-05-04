<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class ExistingController extends Controller
{
    public function show()
    {
           //Displaying existing Tasks
           $tasks = Task::orderBy('created_at','asc')
           ->get();
           // Showing the Task
           return view('tasks',[
               'tasks'=>$tasks
           ]);
    }
}
