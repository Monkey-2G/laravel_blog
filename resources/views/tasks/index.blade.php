@extends('layout')

@section('title')
    Tasks
@endsection

@section('content')
    <div class="px-64">
        <h1 class="font-bold text-3xl">Task List</h1>
        @foreach ($tasks as $task)
        <a href="tasks/{{ $task->id }}">
            <li class="border m-3"> Title : {{ $task->title }} <small class="float-right">{{ $task->created_at}}</small></li>
        </a>
        @endforeach
    </div>    
@endsection