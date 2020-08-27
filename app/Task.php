<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /*
    DB 저장, 수정시 사용할 column을 지정한다.
    해당 선언을 하지 않으면, DB 저장시, fillable 설정을 하라고 erroe message가 출력되면서 실행이 되지 않는다.
    */ 
    protected $fillable = ['title', 'content', 'user_id']; 
    // protected $guarded = ['title,' 'content']; // fillable와는 반대로 사용하지 않을 column을 지정한다.
}
