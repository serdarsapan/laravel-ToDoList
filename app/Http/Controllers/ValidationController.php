<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Task;

class ValidationController extends Controller
{

    public function add(Request $request)
    {
       // Adding the Task
       $validator = Validator::make($request->all(),[
        'name'=>'required|max:255',
    ]);
        if ($validator->fails()) {
        return redirect('/')
        ->withInput()
        ->withErrors($validator);
        }
    
    }
}
