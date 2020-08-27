@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
<div class="px-64">
    <h1 class="font-bold text-3xl">Create Task</h1>
    <form action="/tasks" method="POST">
        <!-- layout.blade 에서 csrf meta tag를 생성한 후, POST로 보낼 page의 form tag 안에 csrf를 선언한다.  -->
        @csrf 
        <label class="block" for="title">Title</label>
    <input class="border border-gray-800 w-full @error('title') border border-red-800 @enderror" type="text" id="title" name="title" value="{{ old('title') ? old('title') : '' }}" required>

        <!-- back-end 부분에서 name값이 title인 태그에 대해 required를 유효성 검사했는데, 통과하지 못하면 아래에서 message를 반환한다. -->
        @error('title')
            <small class="text-red-700"> {{ $message }}</small>
        @enderror
        
        <label class="block" for="content">content</label>
        <textarea class="border border-gray-800 w-full @error('content') border border-red-800 @enderror" id="content" name="content" cols="30" rows="10"required>{{ old('content') ? old('content') : '' }}</textarea>
        
        @error('content')
        <small class="text-red-700"> {{ $message }}</small>
        @enderror
        
        <button class="block bg-blue-600 text-white px-4 py-2" float-right>Submit</button>
        <div class="border float-right">
            <a href="/tasks" class="border text-white bg-purple-500 hover:bg-purple-600 px-4 py-2">move to list</a>
        </div>
    </form>
</div>
@endsection