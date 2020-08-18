@extends('layout')

@section('title', 'Create Task')

@section('content')
<div class="px-64">
    <h1 class="font-bold text-3xl">Create Task</h1>
    <form action="/tasks" method="POST">
        <!-- layout.blade 에서 csrf meta tag를 생성한 후, POST로 보낼 page의 form tag 안에 csrf를 선언한다.  -->
        @csrf 
        <label class="block" for="title">Title</label>
        <input class="border border-gray-800 w-full" type="text" id="title" name="title">   
        <label class="block" for="content">content</label>
        <textarea class="border border-gray-800 w-full " id="content" name="content" cols="30" rows="10"></textarea>
        <button class="block bg-blue-600 text-white px-4 py-2" float-right>Submit</button>
        <div class="border float-right">
            <a href="/tasks" class="border text-white bg-purple-500 hover:bg-purple-600 px-4 py-2">move to list</a>
        </div>
    </form>
</div>
@endsection