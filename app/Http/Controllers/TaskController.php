<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index ()
    {
        // $tasks = Task::all(); // 6 Line에 선언된 Task Model(tasks Database)의 정보를 모두 가져온다.
        // 6 Line에 선언된 Task Model(tasks Database)에서 자기 자신이 작성한 내용을 내림차순으로 모두 가져온다 (Desc). 
        // $tasks = Task::latest()->where('user_id', auth()->id())->get();    

        // User.php Model file에 tasks 관계를 설정함으로써, 로그인한 회원의 tasks List를 구할 수 있다.
        $tasks = auth()->user()->tasks()->latest()->get()   ; 

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
        
        /* 
        request 값들의 유효성 검사를 back-end 에서 할 수 있다. 
        HTML 태그쪽에서 required를 설정하지 않아도, 아래 코드와 같이 name값의 유효성 검사를 설정할 수 있다.
        만약 해당 유효성 검사가 통과하지 않을 시, 기본적으로는 redirect를 하게 된다.
        */
         request()->validate([
             'title' => 'required',
             'content' => 'required'
             ]);

         /*
         아래 구문과 다른점은 request method를 사용했다.
         request() method는 Laravel에서 기본 제공되며, 25 Line의 function 의 parameter Request를 선언하지 않고도
         reuqest 값을 가져올 수 있다.
         */
         //$task = Task::create(request(['title', 'content']));

         $values = request(['title', 'content']);
         $values['user_id'] = auth()->id(); // 현재 로그인된 (auth)의 id를 가져온다.

         $task = Task::create($values);

        /*
        $task = Task::create([
            'title' => $request->input('title'), // Request 항목 중 input type의 name이 title인 값을 Task의 title column에 생성한다.
            'content' => $request->input('content')    // Request 항목 중 input type의 name이 body인 값을 Task의 body column에 생성한다.
        ]);
         */

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
       /* 
        현재 로그인한 id와 Task model의 user_id (= task table의 user_id)가 같지 않을 경우, 403 error 반환.
        abort 함수는 HTTP exception 발생.
        abort_if 함수는 if문이 참일 때 HTTP exception 발생. 
        abort_unless 함수는 if문이 거짓일 때  HTTP exception 발생.

        if(auth()->id() != $task->user_id)
        {
            abort(403);
        }   
        abort_if(auth()->id() != $task->user_id, 403);
        */
        abort_unless(auth()->user()->owns($task), 403); // owns 함수는 User Model에서 만들어서 사용한다.

      return view('tasks.show', ['task' => $task]);  
    }

    public function edit(Task $task) 
    {
        return view('tasks.edit', ['task' => $task]);
    }

    public function update(Task $task)
    {
        abort_unless(auth()->user()->owns($task), 403); // owns 함수는 User Model에서 만들어서 사용한다.

        request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $task ->update(request(['title', 'content']));

        /*
        $task->update([
            'title' => request('title'),
            'content' => request('content')
        ]);
        */
        return redirect('/tasks/'.$task->id);
    }

    public function destory(Task $task)
    {
        abort_unless(auth()->user()->owns($task), 403); // owns 함수는 User Model에서 만들어서 사용한다.

        $task->delete();
        
        return redirect('/tasks');
    }
}
