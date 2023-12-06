<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table ="comments";
    protected $fillable = [
        'comment_text',
        'id_task',
        'id_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function tasks()
    {
        return $this->belongsTo(Tasks::class, 'id_task');
    }
}
