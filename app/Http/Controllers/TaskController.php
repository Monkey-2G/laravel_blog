<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index ()
    {
        $tasks = Task::all(); // 6 Line에 선언된 Task Model(tasks Database)의 정보를 모두 가져온다.

        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request) // request는 5 Line에 선언된 HTTP Request를 말한다.
    {
        /*
        Task는 Http/App 경로에 있는 Task Model을 가져온 것이다. 
        tasks Database에 데이터를 저장하려는 것이기 때문에 해당 Model을 사용한다고 선언 한 후 아래처럼 작성한다. (6 Line)
         */

        Task::create([
            'title' => $request->input('title'), // Request 항목 중 input type의 name이 title인 값을 Task의 title column에 생성한다.
            'content' => $request->input('content')    // Request 항목 중 input type의 name이 body인 값을 Task의 body column에 생성한다.
        ]);

        return redirect('/tasks');
    }
}
