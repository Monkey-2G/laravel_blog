@extends('layouts.app')

@section('title')
    Tasks
@endsection

@section('content')
    <div class="px-64 mt-3">
        <div class="flex">
            <h1 class="font-bold text-3xl flex-1">Task List</h1>
            <a href="/tasks/create">
                <button type="button" class="flex-inital border text-white bg-green-500 hover:bg-green-600 px-4 py-2">Create Task</button>
            </a>
        </div>
        @foreach ($tasks as $task)
        <a href="tasks/{{ $task->id }}">
            <li class="border my-3 p-3"> Title : {{ $task->title }} <small class="float-right">{{ $task->created_at}}</small></li>
        </a>
        @endforeach
    </div>    
@endsection