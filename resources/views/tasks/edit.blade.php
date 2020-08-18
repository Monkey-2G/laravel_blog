@extends('layout')

@section('title', 'Edit Task')

@section('content')
<div class="px-64">
    <h1 class="font-bold text-3xl">Edit Task</h1>
    <form action="/tasks/{{$task->id}}" method="POST">
        <!-- Laravel 에서는 update시 method가 PUT/PATCH로 넘겨주어야하지만, HTML에는 GET/POST밖에 없다. 그래서 아래와 같이 METHOD를 선언한다. -->
        @method('PUT')
        <!-- layout.blade 에서 csrf meta tag를 생성한 후, POST로 보낼 page의 form tag 안에 csrf를 선언한다.  -->
        @csrf 
        <label class="block" for="title">Title</label>
        <input class="border border-gray-800 w-full" type="text" id="title" name="title" value="{{ $task->title }}">   
        <label class="block" for="content">content</label>
        <textarea class="border border-gray-800 w-full " id="content" name="content" cols="30" rows="10">{{ $task->content }}</textarea>
        <button class="block bg-blue-600 text-white px-4 py-2" float-right>Update</button>
    </form>
</div>
@endsection