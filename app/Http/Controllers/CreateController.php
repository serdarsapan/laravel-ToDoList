<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class CreateController extends Controller
{

    public function create(Request $request)
    {
         // Creating the Task
         $task = new Task;
         $task->name = $request->name;
         $task->save();
         
         return redirect('/');
    }
}
