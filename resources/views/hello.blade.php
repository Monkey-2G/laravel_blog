<!-- layout.blade page를 상속한다. include와 같은 개념으로 생각하면 될듯. -->
@extends('layout')

<!--layout.blog page에서 title을 yield한 부분을 정의하여 작성한다.  -->
@section('title')
 Hello
@endSection

<!--layout.blog page에서 content를 yield한 부분을 정의하여 작성한다.  -->
@section('content')
 This Area is hello.blade Area!

 <ul>
   <!-- 직접 vue 명령어로 foreach문을 돌릴 수도 있다. 중괄호 두 개 기호는 php echo문으로 이해하면 될듯. -->
   @foreach($fruit as $fruit)
   <li>{{$fruit}}</li>
   @endForeach
 </ul>
@endSection
