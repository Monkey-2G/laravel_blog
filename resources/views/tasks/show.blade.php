@extends('layout')

@section('title', 'Task Detail')

@section('content')
<div class="px-64 mt-4">
    <div class="flex">
        <h1 class="font-bold text-3xl flex-1">Task Detail</h1> 
        <div class="felx-initial">
            <a href="/tasks/{{ $task->id }}/edit">
                <button class="flex-inital bg-yellow-500 px-4 py-1 text-white hover:bg-yellow-600">Edit</button>
            </a>
            <form action="/tasks/{{ $task->id }}" method="POST" class="float-right ml-2">
                @method('DELETE')
                @csrf
                <button class="flex-inital bg-red-500 px-4 py-1 text-white hover:bg-red-600">Delete</button>
            </form>
        </div>
    </div>
    Title : {{ $task->title }} 
    <small class="float-right">Created at {{ $task->created_at }}</small>
    <br>
    <small class="float-right">updated at {{ $task->updated_at }}</small>
    <br>
    Content
    <div class="block border p-3 m-5"> {{ $task->content }}</div>
    <div class="border float-right">
        <a href="/tasks" class="border text-white bg-purple-500 hover:bg-purple-600 px-4 py-2">move to list</a>
    </div>
</div>
@endsection