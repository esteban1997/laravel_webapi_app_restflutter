<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Behavioral extends Model
{
    use HasFactory;

    protected $fillable = ['behavioral_id','behavioral_type','behavioral_model','content1','content2'];

}
