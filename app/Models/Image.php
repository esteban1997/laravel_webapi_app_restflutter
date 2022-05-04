<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['url','name','group_id'];


    public function behavior(){
        return $this->morphOne(Behavioral::class,'behavioral');
    }
}
