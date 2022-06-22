<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
use App\Models\User;
use App\Models\Tag;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'slug',
        'duration',
        'proj_url',
        'proj_skill_id',
    ];

    protected $statuses = array(
        '1' => 'On Hold',
        '2' => 'Canceled',
        '3' => 'Start',
        '4' => 'Working',
        '5' => 'Success',
    );

    public function getStatusAttribute($value)
    {
        return $this->statuses[$value];
    }

    public function getSkillsname($data){
        $skillIds = explode(',', $data);
        $tagnames = array();
        foreach($skillIds as $skillId)
        {
           $tag = Tag::find($skillId);
           if(!empty($tag))
           {
            $tagnames[] =  ucwords($tag->title);
          }

        }
        return implode(', ', $tagnames);
    }

    public function review(){
        return $this->hasMany(Review::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }

}
