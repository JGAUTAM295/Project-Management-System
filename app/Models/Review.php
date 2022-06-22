<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\User;

class Review extends Model
{
    use HasFactory;

    public function getUser($userId)
    {
        $user = User::find($userId);
        if(!empty($user))
        {
            return ucwords($user->name);
        }  
    }

    public function project(){
        $this->belongsTo(Project::class);
    }
    
    public function user(){
        $this->belongsTo(User::class);
    }
}
