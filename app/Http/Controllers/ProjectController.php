<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = \App\Project::all(); // App/project.php 의 모델을 모두 가져온다.
        
        // 폴더를 지정할 때에는 폴더명.파일명 으로 작성한다.
        return view('projects.index')->with([
            'projects' => $projects
            ]);
    }
}
