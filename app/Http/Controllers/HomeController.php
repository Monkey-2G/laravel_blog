<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function hello()
    {
      $fruit = [
        'banana',
        'apple',
        'peach'
      ];

    // 아래 view page에 데이터를 전달하는 3가지 방법은 모두 같은 방법이지만 2 번째 방법을 많이 사용하는 듯 하다.
      // return view('hello', ['fruit'=>$fruit]);
       return view('hello')->with(['fruit'=>$fruit]);
      // return view('hello')->withFruit($fruit);
    }

    public function contact()
    {
      return view('contact');
    }
}
