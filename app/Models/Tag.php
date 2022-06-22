<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $statuses = array(
        '1' => 'Active',
        '2' => 'Deactive',
    );

    public function getStatusAttribute($value)
    {
        return $this->statuses[$value];
    }

}
