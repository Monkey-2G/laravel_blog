@extends('layout')

@section('title', 'Show Task')

@section('content')
<div class="px-64">
    <h1 class="font-bold text-3xl">Task Detail</h1>
    Title : {{ $task->title }} <small class="float-right">Created at {{ $task->created_at }}</small>
    <br>
    Content
    <div class="block border p-3 m-5"> {{ $task->content }}</div>
    <div class="border float-right">
        <a href="/tasks">move to list</a>
    </div>
</div>
@endsection