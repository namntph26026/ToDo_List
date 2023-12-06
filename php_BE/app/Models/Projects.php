<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projects extends Model
{
    use HasFactory, SoftDeletes;
    protected $table ="projects";
    protected $fillable = [
        'project_name',
        'project_workspace',
        'project_favorites',
        'id_user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function tasks()
    {
        return $this->hasMany('App\Models\Tasks', 'id_project');
    }
}
