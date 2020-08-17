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

        $task 라는 변수에 create (DB insert) action을 실행시키면, action이 실행된 record의 정보를 담게 된다. 
         */

        $task = Task::create([
            'title' => $request->input('title'), // Request 항목 중 input type의 name이 title인 값을 Task의 title column에 생성한다.
            'content' => $request->input('content')    // Request 항목 중 input type의 name이 body인 값을 Task의 body column에 생성한다.
        ]);

        /* 
            Task::create action을 완료한 후, 이동할 page를 설정한다.
            create (DB insert) action이 실행되어 DB에 저장된 record의 id 값으로
            저장된 값이 바로 보여질 수 있도록 redirect 경로를 설정한다.
        */
        return redirect('/tasks/'.$task->id); 
    }

    /* 
        parameter를 6 Line에 선언된 Model로 지정할 수 있다.
        그렇게 선언을 하게 되면 tasks/1 로 넘어온 parameter 값인 1을 
        Task model(tasks Database)의 primary key 값을 찾아서 바로 반환하게 된다.
        DB에 PK 값이 1 밖에 없을 때, 1 외의 값들을 URL에 입력해봤더니 404 Not found Error를 반환한다.
    */
    public function show (Task $task)
    {
      return view('tasks.show', ['task' => $task]);  
    }
}
