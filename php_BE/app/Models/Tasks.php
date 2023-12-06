<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tasks extends Model
{
    use HasFactory, SoftDeletes;
    protected $table= "tasks";
    protected $fillable =[
        'task_name',
        'task_description',
        'deadline',
        'priority',
        'id_project',
        'id_user',
        'statusht'
    ];
    public function projects(){
        return $this->belongsTo('App\Models\projects','id_project','id');
    }

    public function users(){
        return $this->belongsTo('App\Models\users','id_user','id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comments', 'id_task');
    }
}
