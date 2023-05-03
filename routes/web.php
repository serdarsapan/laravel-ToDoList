<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Task;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['middleware' => 'web'], function(){
    Route::get('/',function(){
        //Displaying existing Tasks
        $tasks = Task::orderBy('created_at','asc')
        ->get();
        // Showing the Task
        return view('tasks',[
            'tasks'=>$tasks
        ]);
    });

    Route::post('/task', function(Request $request){
        // Adding the Task
        $validator = Validator::make($request->all(),[
            'name'=>'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/')
            ->withInput()
            ->withErrors($validator);
        }
        // Creating the Task
        $task = new Task;
        $task->name = $request->name;
        $task->save();
        
        return redirect('/');
    });

    Route::delete('/task/{task}', function(Task $task){
        // Deleting the Task
        $task->delete();

        return redirect('/');
    });
});